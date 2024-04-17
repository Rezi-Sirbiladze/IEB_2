<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use Carbon\Carbon;

class CreateActivitiesSeeder extends Seeder
{
    public function run()
    {
        Activity::insert(array('name' => 'ACTIVITAT CONJUNTA', 'description' => "Activitat sorpresa! Prepara't per a passar l'última estona amb tots els teus companys i companyes i tots els nostres tècnics junts en un espai on no existeix la vergonya! Aquestes preparat i preparada?", 'image_path' => 'Design - Option C.png', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'FAMA', 'description' => "Classe pre coreografiada de condicionament físic, inspirada en la cultura llatina amb sons també internacionals. La fórmula barreja el ball amb exercicis de tonificació per a totes les persones sense importar la seva edat, el seu estat físic, el seu entorn, ja que no requereix un nivell ni d'una experiència prèvia.", 'image_path' => 'foto 1.jpg', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'WOD', 'description' => "Propi de la disciplina del CrossFit. Les seves sigles signifiquen \"Work Of the Day\", que significa la rutina i els exercicis que s'han de realitzar aquell dia en concret. Aquesta rutina està composta d'exercicis físics que combinen la força, gimnàstica i resistència.", 'image_path' => 'foto 2.jpg', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'BOXA', 'description' => "Millora la teva força, coordinació i resistència cardiovascular mentre aprens tècniques de colpeig i defensa en una disciplina que desafia tant el cos com la ment.", 'image_path' => 'foto 16.jpg', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'CORE Y TRX', 'description' => "Treball intens d'abdominals amb diferents tipus de planxes i crunches abdominals, combinat amb un treball funcional mitjançant exercicis on usarem el nostre propi pes corporal en suspensió (TRX).", 'image_path' => 'foto 4.jpg', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'OPOSICIONS', 'description' => "Consisteix en conèixer les proves de les oposicions de les forces de seguretat de l'estat, per a posar-te a prova i veure a quin nivell et trobes. T'animes?", 'image_path' => 'foto 5.jpg', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'POSTURAL', 'description' => "Activitat on el cos i ments treballen de forma integral per a la millora la condició física, el control postural, la flexibilitat i la respiració. La combinació d'exercicis d'estiraments i tonificació de les diferents cadenes musculars seran bàsics per garantir la correcta estabilització de la columna. Integrar la relaxació com a part del nostre concepte de salut i entrenament és un dels pilars del Control Postural.", 'image_path' => 'foto 6.jpg', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'TWERK', 'description' => "Classe de ball coreografica de 45 minuts on se’t presentaràn els passos més bàsics del Twerk, estil de ball centrat en moviments pelvics. Per a venir i passar-t’ho bé necessitaràs: treure’t la vergonya de sobre, ment oberta i la roba (pantalons) que et permeti moure’t amb llibertat i amb quina et sentis comode (des de la més llarga fins la més curta)", 'image_path' => 'foto 10.jpg', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'BY COMBAT', 'description' => "El que es busca aquest taller és mostrar aquesta innovadora modalitat on un treball aeròbic d'alta intensitat es combina amb els gestos tècnics de diferents arts marcials com el Taekwondo, Boxa, karate , Muay Thai,... En format coreografiat per incloure el ritme i la coordinació, i utilitzant cops de puny, puntades, guàrdies,...", 'image_path' => 'foto 7.jpg', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'NUTRICIÓ REPTES', 'description' => "T'has plantejat mai quin tipus d'alimentació porten els esportistes? Sabries dir quines adaptacions alimentàries ha de tenir un esportista de resistència? I de força-potència?
        Vine a fer un taller amb l'alumnat de dietètica de l'IAB per aprendre consells nutricionals bàsics I característics per a diferents tipus d'esportistes", 'image_path' => 'foto 8.jpg', 'created_at' => Carbon::now(),));
        Activity::insert(array('name' => 'A CUINAR!', 'description' => "Si vols aprendre a fer un menú senzill, ràpid, energetic i saludable, que et serveixi per abans d'anar a fet el teu entrenament, o per després, passa't a fer un taller de cuina amb l'alumnat de dietètica de l'IAB. I al final del taller, a fer el tastet... segur que  t'agradarà.
        ", 'image_path' => 'foto 9.jpg', 'created_at' => Carbon::now(),));

        Activity::insert(array(
            'name' => 'SPARTAN RACE',
            'description' => "Desafia els teus límits mentre superes obstacles físics i mentals en un emocionant recorregut de resistència i determinació.",
            'image_path' => 'foto 11.jpg',
            'created_at' => Carbon::now(),
        ));

        Activity::insert(array(
            'name' => 'BODI COMBAT',
            'description' => "Allibera la teva energia mentre et submergeixes en una classe de cardio intens inspirada en les arts marcials, on combines cops i puntades al ritme de la música.",
            'image_path' => 'foto 12.jpg',
            'created_at' => Carbon::now(),
        ));

        Activity::insert(array(
            'name' => 'ZUMBA',
            'description' => "Balla i crema calories al ritme de la música llatina en una sessió plena de diversió i moviment que millora la teva condició física i eleva el teu estat d'ànim.",
            'image_path' => 'foto 13.jpg',
            'created_at' => Carbon::now(),
        ));

        Activity::insert(array(
            'name' => 'OPOSICIONS',
            'description' => "Prepara't físicament i mentalment per a superar proves d'agilitat i força, així com desafiaments de resistència que t'ajudaran a aconseguir el teu objectiu d'ingressar a les forces de seguretat.",
            'image_path' => 'foto 14.jpg',
            'created_at' => Carbon::now(),
        ));

        Activity::insert(array(
            'name' => 'HYROX',
            'description' => "Posa a prova la teva resistència i habilitats funcionals mentre t'enfrontes a una sèrie de desafiaments físics i tècnics dissenyats per a portar el teu entrenament al següent nivell.",
            'image_path' => 'foto 15.jpg',
            'created_at' => Carbon::now(),
        ));

        Activity::insert(array(
            'name' => 'BOXA',
            'description' => "Millora la teva força, coordinació i resistència cardiovascular mentre aprens tècniques de colpeig i defensa en una disciplina que desafia tant el cos com la ment.",
            'image_path' => 'foto 16.jpg',
            'created_at' => Carbon::now(),
        ));

        Activity::insert(array(
            'name' => 'ESTIRAMENTS',
            'description' => "Utilitza eines com el foam roller i els cadenats miofascials per a alliberar tensions musculars, millorar la flexibilitat i accelerar la recuperació després de l'exercici.",
            'image_path' => 'foto 17.jpg',
            'created_at' => Carbon::now(),
        ));

        Activity::insert(array(
            'name' => 'CONTROL POSTURAL',
            'description' => "Aprèn tècniques i exercicis específics per a millorar la teva alineació corporal i prevenir lesions, promovent una postura més saludable i alçada.",
            'image_path' => 'foto 18.jpg',
            'created_at' => Carbon::now(),
        ));

        Activity::insert(array(
            'name' => 'TALLERS DE NUTRICIÓ',
            'description' => "Obtingues coneixements i eines pràctiques per a optimitzar el teu rendiment esportiu, gestionar la teva alimentació de manera adequada i desenvolupar habilitats mentals que t'ajudaran a aconseguir les teves metes esportives.",
            'image_path' => 'Design - Option C.png',
            'created_at' => Carbon::now(),
        ));

        Activity::insert(array(
            'name' => 'PSICOLOGIA ESPORTIVA',
            'description' => "Obtingues coneixements i eines pràctiques per a optimitzar el teu rendiment esportiu, gestionar la teva alimentació de manera adequada i desenvolupar habilitats mentals que t'ajudaran a aconseguir les teves metes esportives.",
            'image_path' => 'Design - Option C.png',
            'created_at' => Carbon::now(),
        ));


        Activity::insert(array(
            'name' => 'ALT RENDIMENT',
            'description' => "Obtingues coneixements i eines pràctiques per a optimitzar el teu rendiment esportiu, gestionar la teva alimentació de manera adequada i desenvolupar habilitats mentals que t'ajudaran a aconseguir les teves metes esportives.",
            'image_path' => 'Design - Option C.png',
            'created_at' => Carbon::now(),
        ));
    }
}
