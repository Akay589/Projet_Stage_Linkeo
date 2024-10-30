<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Materiel;

class ExportMaterielsToCSV extends Command
{
    // Nom de la commande
    protected $signature = 'materiels:export';

    // Description de la commande
    protected $description = 'Exporter les matériels en CSV';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Récupérer les matériels
        $materials = Materiel::all(['designation', 'num_serie', 'date_achat', 'status', 'categorie','usager', 'etiquette', 'remarque', 'services', 'emplacement', 'type', 'operateur', 'mac', 'ip', 'user']);

        // Définir le chemin du fichier CSV
        $filePath = storage_path('app/public/materials.csv');

        // Ouvrir un fichier en écriture
        $file = fopen($filePath, 'w');

        // Écrire les en-têtes du CSV
        fputcsv($file, ['Designation', 'Num Serie', 'Date Achat', 'Status', 'Categorie', 'Usager', 'Etiquette', 'Remarque', 'Services', 'Emplacement', 'Type', 'Operateur', 'Mac', 'Ip', 'User']);

        // Boucler sur les données pour les écrire dans le fichier CSV
        foreach ($materials as $material) {
            fputcsv($file, [
                $material->designation,
                $material->num_serie,
                $material->date_achat,
                $material->status,
                $material->categorie,
                $material->usager,
                $material->etiquette,
                $material->remarque,
                $material->services,
                $material->emplacement,
                $material->type,
                $material->operateur,
                $material->mac,
                $material->ip,
                $material->user
            ]);
        }

        // Fermer le fichier
        fclose($file);

        // Confirmation dans la console
        $this->info('Les matériels ont été exportés avec succès dans materials.csv');
    }
}
