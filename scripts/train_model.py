import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import LabelEncoder
import joblib

# Charger les données préparées
X = pd.read_csv('/home/frazafimamonjy/Laravel_project/storage/app/public/prepared_features.csv')
y = pd.read_csv('/home/frazafimamonjy/Laravel_project/storage/app/public/prepared_labels.csv')

# Initialiser un dictionnaire pour stocker les encodeurs
encoders = {}

# Appliquer l'encodage à chaque colonne qui n'est pas numérique
label_encoder = LabelEncoder()
for col in X.columns:
    if X[col].dtype == 'object':  # Si c'est une chaîne, on encode
        le = LabelEncoder()
        X[col] = le.fit_transform(X[col].astype(str))
        encoders[col] = le  # Sauvegarder l'encodeur pour la colonne

# Division du jeu de données en ensembles d'entraînement et de test
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Créer et entraîner le modèle
model = RandomForestClassifier()
model.fit(X_train, y_train.values.ravel())

# Sauvegarder le modèle et les encodeurs
joblib.dump(model, '/home/frazafimamonjy/Laravel_project/storage/app/public/material_classifier_model.pkl')
joblib.dump(encoders, '/home/frazafimamonjy/Laravel_project/storage/app/public/encoders.pkl')

print("Modèle entraîné et sauvegardé avec succès.")

