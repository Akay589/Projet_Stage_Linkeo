from flask import Flask, request, jsonify
import pandas as pd
import joblib
import logging

app = Flask(__name__)
logging.basicConfig(
    level=logging.INFO,
    format='%(asctime)s - %(levelname)s - %(message)s'
)

model_file_path = "modele_random_forest.pkl"
model, label_encoders, feature_names = joblib.load(model_file_path)

def encode_feature(column, value):
    if not value or pd.isna(value) or str(value).strip() == '':
        value = 'Unknown'
    value = str(value)
    encoder = label_encoders[column]
    return encoder.transform([value])[0] if value in encoder.classes_ else -1

def get_feature_importance():
    feature_importance = pd.DataFrame({
        'feature': feature_names,
        'importance': model.feature_importances_
    })
    return feature_importance.sort_values('importance', ascending=False)

@app.route('/predictcategorie', methods=['POST'])
def predict_categorie():
    try:
        data = request.json
        app.logger.info(f"Received data: {data}")

        # Load training data
        training_data = pd.read_csv("/home/frazafimamonjy/Laravel_project/storage/app/public/materials.csv")

        # Focus on key identifying features
        matching_features = ['Designation', 'Type', 'Operateur', 'Num Serie']

        # Find matches based on designation first
        matches = training_data[training_data['Designation'].str.lower() == data['Designation'].lower()]

        if not matches.empty:
            predicted_category = matches['Categorie'].iloc[0]
            confidence = 1.0

            response = {
                'predicted_categorie': predicted_category,
                'confidence': confidence,
                'match_type': 'exact_designation',
                'input_features': data
            }
            return jsonify(response)

        # If no direct match, proceed with model prediction
        input_data = []
        feature_values = {}
        for feature in feature_names:
            value = data.get(feature, 'Unknown')
            encoded_value = encode_feature(feature, value)
            input_data.append(encoded_value)
            feature_values[feature] = value

        # Get prediction and probabilities
        prediction = model.predict([input_data])[0]
        probabilities = model.predict_proba([input_data])[0]
        categories = label_encoders['Categorie'].classes_
        predicted_category = categories[prediction]
        confidence = float(max(probabilities))

        response = {
            'predicted_categorie': predicted_category,
            'confidence': confidence,
            'match_type': 'model_prediction',
            'input_features': feature_values
        }

        return jsonify(response)

    except Exception as e:
        app.logger.error(f"Error during prediction: {str(e)}")
        return jsonify({
            'error': 'Prediction failed',
            'message': str(e)
        }), 500

@app.route('/health', methods=['GET'])
def health_check():
    return jsonify({'status': 'healthy', 'model_loaded': True})

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)

