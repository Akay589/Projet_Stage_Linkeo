import pandas as pd
from sklearn.preprocessing import LabelEncoder

# Chemin vers le fichier CSV
input_csv = '/home/frazafimamonjy/Laravel_project/storage/app/public/materials.csv'

# Lire les données depuis le fichier CSV
df = pd.read_csv(input_csv)

# Vérifier les colonnes disponibles
print("Colonnes dans le CSV :", df.columns)

# Sélection des colonnes pertinentes, sauf 'Categorie' qui est la variable cible
X = df[['Designation', 'Num Serie', 'Date Achat', 'Status', 'Usager', 'Etiquette', 'Remarque', 'Services', 'Emplacement', 'Type', 'Operateur', 'Mac', 'Ip', 'User']]
y = df['Categorie']  # Colonne cible

# Encodage des colonnes catégoriques
label_encoder = LabelEncoder()
X_encoded = X.copy()

# Encoder seulement les colonnes catégoriques
for col in ['Designation', 'Num Serie', 'Date Achat', 'Status', 'Usager', 'Etiquette', 'Remarque', 'Services', 'Emplacement', 'Type', 'Operateur', 'Mac', 'Ip', 'User']:
    X_encoded[col] = label_encoder.fit_transform(X[col].astype(str))

# Encodage de la colonne cible 'y' (Categorie)
y_encoded = label_encoder.fit_transform(y)

# Sauvegarde des données traitées
X_encoded.to_csv('/home/frazafimamonjy/Laravel_project/storage/app/public/prepared_features.csv', index=False)
pd.DataFrame(y_encoded, columns=['categorie']).to_csv('/home/frazafimamonjy/Laravel_project/storage/app/public/prepared_labels.csv', index=False)

print("Données préparées et sauvegardées avec succès.")
