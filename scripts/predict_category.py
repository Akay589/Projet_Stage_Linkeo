from flask import Flask, request, jsonify
import pandas as pd
import joblib

# Charger le modèle
model_path = '/home/frazafimamonjy/Laravel_project/storage/app/public/material_classifier_model.pkl'
model = joblib.load(model_path)

# Créer l'application Flask
app = Flask(__name__)

# Route pour prédire la catégorie à partir de données JSON
@app.route('/predict', methods=['POST'])
def predict():
    try:
        # Récupérer les données JSON de la requête
        data = request.get_json()

        # Vérifier que des données ont été envoyées
        if not data:
            return jsonify({'error': 'Aucune donnée reçue'}), 400

        # Convertir les données en DataFrame
        df = pd.DataFrame([data])

        # Remplacer les valeurs manquantes par 'unknown' ou une autre valeur par défaut
        df.fillna('unknown', inplace=True)

        # Convertir les noms de colonnes en title case pour correspondre aux noms de colonnes du jeu de données d'entraînement
        df.columns = [col.title() for col in df.columns]

        # Faire la prédiction
        prediction = model.predict(df)

        # Retourner la prédiction sous forme de JSON
        return jsonify({'prediction': prediction[0]})

    except Exception as e:
        return jsonify({'error': str(e)}), 500

# Démarrer le serveur Flask
if __name__ == '__main__':
    app.run(debug=True, host='127.0.0.1', port=5000)
