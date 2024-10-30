import os
import pandas as pd
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score, classification_report
from sklearn.preprocessing import LabelEncoder
from sklearn.model_selection import train_test_split
import joblib

file_path = '/home/frazafimamonjy/Laravel_project/storage/app/public/materials.csv'
df = pd.read_csv(file_path)

# Include all possible identifying features
all_features = [
    'Designation', 'Num Serie', 'Status', 'Usager',
    'Etiquette', 'Services', 'Emplacement', 'Type',
    'Operateur', 'Mac', 'Ip', 'User', 'Categorie'
]

df = df[all_features]
df = df.replace(r'^\s*$', 'Unknown', regex=True)
df.fillna('Unknown', inplace=True)

print("\nCategory distribution in dataset:")
print(df['Categorie'].value_counts())

label_encoders = {}
for column in all_features:
    label_encoders[column] = LabelEncoder()
    df[column] = label_encoders[column].fit_transform(df[column])

X = df.drop('Categorie', axis=1)
y = df['Categorie']

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

model = RandomForestClassifier(
    n_estimators=300,
    max_depth=20,
    min_samples_split=3,
    class_weight='balanced',
    random_state=42
)
model.fit(X_train, y_train)

# Save feature importance information
feature_importance = pd.DataFrame({
    'feature': X.columns,
    'importance': model.feature_importances_
})
print("\nFeature Importances:")
print(feature_importance.sort_values('importance', ascending=False))

model_file_path = "modele_random_forest.pkl"
joblib.dump((model, label_encoders, X.columns.tolist()), model_file_path)

y_pred = model.predict(X_test)
print(f'\nAccuracy: {accuracy_score(y_test, y_pred):.2f}')
print('\nClassification Report:')
print(classification_report(y_test, y_pred))
