<?php

use Illuminate\Database\Seeder;
use App\Cotation;

class CotationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		        /**
		 * Renvoie la valeur de mise sur le marché de la crypto monnaie
		 * @param $cryptoname {string} Le nom de la crypto monnaie
		 */
		function getFirstCotation($cryptoname){
		  return ord(substr($cryptoname,0,1)) + rand(0, 10);
		}

		/**
		 * Renvoie la variation de cotation de la crypto monnaie sur un jour
		 * @param $cryptoname {string} Le nom de la crypto monnaie
		 */
		function getCotationFor($cryptoname){
			return ((rand(0, 99)>40) ? 1 : -1) * ((rand(0, 99)>49) ? ord(substr($cryptoname,0,1)) : ord(substr($cryptoname,-1))) * (rand(1,10) * .01);
		}

		
		
			$pdo = new PDO('mysql:host=localhost;dbname=bitchest', 'root', '', array(
		    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

			$resultat = $pdo -> query('select * from cryptos');
			$cryptos = $resultat -> fetchAll(PDO::FETCH_ASSOC);	

			foreach($cryptos as $c){
			//dd($c);
		    extract($c);
		    $crypto_id = getFirstCotation($id);
		    $valeur_nominale = getFirstCotation($nom);
		    $date = date('Y-m-d', time()+ (6*86400));

		    // ATTENTIION POTENTIELLEMENT A MODIFIER
		    $pdo -> exec("insert into cotations (crypto_id, valeur, date, cours, evolution) value(".$crypto_id.",".$valeur_nominale.",'".$date."',". 0.00.",". 0.00 .")");
		    $valeur[] = $valeur_nominale;

		    echo '<h1>Valeur nominale : ' . $valeur_nominale .  '</h1>';

		    for($i = 1; $i <= 30; $i++ ){
		        $evolution = getCotationFor($nom);
		        $valeur[$i] = $valeur[$i -1 ] + $evolution;

		        $date = date('Y-m-d', time() + (6*86400) + ($i * 86400));
		        $valeur_actuelle =  $valeur[$i];
		        $indice = $i - 1;
		        $cours = $evolution / $valeur[$indice] * 100;

		        echo 'date : ' . $date . '<br/>';
		        echo 'Evolution : ' . $evolution . '<br/>';
		        echo 'Valeur de base : ' . $valeur[$indice] . '<br/>';
		        echo 'Nlle valeur : ' . $valeur_actuelle . '<br/>';
		        echo 'Pourcentage : ' . $cours . '<hr/>';

		        // ATTENTIION POTENTIELLEMENT A MODIFIER
		        $pdo -> exec("insert into cotations (crypto_id, valeur, date, cours, evolution) value(".$crypto_id.",".$valeur_nominale.",'".$date."',". 0.00.",". 0.00 .")");
		    }
		} 

		/*$cotations = Cotation::all();
        foreach ($cotations as $cotation) {
            $firstCotation = getFirstCotation($cotation->nom_crypto);
            for ($i=0; $i < 30; $i++) {
                $date = date('Y-m-d', strtotime(-$i.' day'));
               DB::Table('cotations')->insert(array([
                'crypto_id' => $cotation->id,
                'date' => $date,
                'taux' =>  getFirstCotation($cotation->nom_crypto) + $firstCotation
                ]));
           }
        }*/
    }
}
