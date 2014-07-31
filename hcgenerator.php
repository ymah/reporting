<?php


/**
 * pie : create a pie with Highcharts API and Json data.
 *
 * @param string $data Json data for pie creating.
 * @param string title of the pie
 */




function pie($data,$title) {


    echo "$(function () {

	var data = new Array();
	var donnee = [".$data."];
	

	    var entries = donnee[0].facets.terms.terms;
		var l = entries.length;
		
		for(i=0;i<l;i++){
		
			data.push([entries[i].term,entries[i].count]);
		}

    $(function () {
	$('#".$title."').highcharts({
		chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
		title:{
			text:\"".$title."\"
		},
	      credits: {
                  enabled: false
        	  },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
		series	:[{
			type:'pie',
			name:'".$title."',
			data : data
		}]

	})
	})
})
	";
}





/**
 * tableau : create a top 10 array with json data.
 *
 * @param string $data Json data for array creating.
 * @param string title of the array
 */


function tableau($data,$title){
    
    $tab = json_decode($data,true);
    $donnee = $tab['facets']['terms']['terms'];
    $len = sizeof($donnee);
    echo '<table style="width:100%;word-wrap:break-word;"  >';
    echo '<caption>'.$title.'<caption>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Element</th>';
    echo '<th>Count</th>';
    echo '</tr>';
    echo '</thead>';
    for($i=0;$i<$len;$i++){
        echo '<tr style="border:1px solid black;">';
        echo '<td style="border:1px solid black;">'.$donnee[$i]['term'].'</td>';
        echo '<td style="border:1px solid black;">'.$donnee[$i]['count'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
}



/**
 * graph : create a chart trough time with json data.
 *
 * @param string $data Json data for the chart creating.
 * @param string title of the chart
 */


function graph($data,$title) {


    echo "$(function () {

	var data = new Array();
	var donnee = [".$data."];


		var entries = donnee[0].facets[17].entries;
		var l = entries.length;
		
		for(i=0;i<l;i++){
					
			data.push([entries[i].time,entries[i].count]);
		}
    $(function () {
	
	$('#".$title."').highcharts({
		chart:{
			type:\"line\"
		},
		title:{
			text:\"".$title."\"
		},
		xAxis:{
			type:'datetime',
			title:{
				text:\"temps\"
			}
		},
		yAxis:{
			title:{
				text:\"count\"
			}
		},
	       credits: {
                   enabled: false
        	},


     plotOptions: {
      series: {
         animation: false
     }
     },
		series:[{
			name :'afm',
			data : data
		}]
		
	
	})
}
)
})";


}


/**
 * commentaire : fonction for creatig a textarea to commente and critisize the data.
 *
 * @param string $title of the chart to comment.
 * 
 */

function commentaire($title){

    echo '<br/><br/>';
    echo '<h3 class="subheader">Commentaire :</h3>
	  <textarea id="'.$title.'-text" class="input" name="'.$title.'-text" rows="12" cols="100">
	  </textarea>';
    echo '            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( "'.$title.'-text" );
            </script><br/>';

}

/**
 * genererPie : fonction wich generate a pie with un comment area  .
 *
 * @param string $path JSon file of the chart's data.
 * @param string $title of the chart to create.
 * @param boolean $com if it's true, you will create the comment area, else you will insert the text of the comment
 */

function genererPie($path,$title,$com){

    echo '<script>';

    $page = "";
    $fp   = fopen($path, "r");
//lecture du fichier
    while (!feof($fp)) {
        //on parcourt toutes les lignes
        $page .= fgets($fp, 4096);
        // lecture du contenu de la ligne
    };
	pie($page, $title);
	fclose($fp);
	

    echo '</script>';
    echo '<div id="'.$title.'" style="height: 400px" name="data"></div>';

    if($com==true){
        commentaire($title);
    }else{
        echo '<p style="text-align:justify">'.$_POST[''.$title.'-text'].'</p>';
        echo '<div class="page-break"></div>';
    }
}

/**
 * genererGraph : fonction wich generate a chart with un comment area  .
 *
 * @param string $path JSon file of the chart's data.
 * @param string $title of the chart to create.
 * @param boolean $com if it's true, you will create the comment area, else you will insert the text of the comment
 */


function genererGraph($path,$title,$com){

    echo '<script>';

    $page = "";
    $fp   = fopen($path, "r");
//lecture du fichier
    while (!feof($fp)) {
        //on parcourt toutes les lignes
        $page .= fgets($fp, 4096);
        // lecture du contenu de la ligne
    };
	graph($page, $title);
	fclose($fp);
	

    echo '</script>';
    echo '<div id="'.$title.'" style="height: 400px" name="data"></div>';
    if($com==true){
        commentaire($title);
    }else{

        echo '<p style="text-align:justify">'.$_POST[''.$title.'-text'].'</p>';
        echo '<div class="page-break"></div>';
    }
}




/**
 * genererGraph : fonction wich generate an array with un comment area  .
 *
 * @param string $path JSon file of the chart's data.
 * @param string $title of the chart to create.
 * @param boolean $com if it's true, you will create the comment area, else you will insert the text of the comment
 */




function genererTab($path,$title,$com,$texte){


    echo '<div id="'.$title.'" name="data">';
    $page = "";
    $fp   = fopen($path, "r");
//lecture du fichier
    while (!feof($fp)) {
        //on parcourt toutes les lignes
        $page .= fgets($fp, 4096);
        // lecture du contenu de la ligne
    ;}
	tableau($page, $title);
	fclose($fp);
	

    echo '</div>';
    if($com==true){
        commentaire($title);
    }else{
        echo '<br/>';
        echo '<p style="text-align:justify">'.$_POST[''.$title.'-text'].'<p>';
        echo '<div class="page-break"></div>';
    }
}


/**
 * generation : fonction wich generate multiple chart from a type  .
 *
 * @param array $array list of couple of data ton generate.
 * @param string $type type of chart to create for all the array data.
 */

function generation($array,$type){

    echo "<br/><br/>";
    switch($type){
    case "graph":
        foreach($array as $j => $id){
            echo "<a id=\"lienMenu\" href=\"#menu\">Retour au menu</a>";
            genererGraph("Json/".$j.".json", $id,true);
            echo "<hr>";
        }
        break;
    case "pie":
        foreach($array as $j => $id){
            echo "<a id=\"lienMenu\" href=\"#menu\">Retour au menu</a>";

            genererPie("Json/".$j.".json", $id,true);
            echo "<hr>";
        }
        break;
 
    case "array":
        foreach($array as $j => $id){
            echo "<a id=\"lienMenu\" href=\"#menu\">Retour au menu</a>";

            genererTab("Json/".$j.".json", $id,true);

            echo "<hr>";
        }
        break;
    }
}


/**
 * generation : fonction wich generate multiple chart from a type withthe objective is to create a printable version  .
 *
 * @param array $array list of couple of data ton generate.
 * @param string $type type of chart to create for all the array data.
 */

function generationPDF($array,$type){

    echo "<br/><br/>";
    switch($type){
    case "graph":
        foreach($array as $j => $id){
            echo "<a id=\"lienMenu\" href=\"#menu\">Retour au menu</a>";
            genererGraph("Json/".$j.".json", $id,false);
            echo "<br/><br/>";
            echo "<hr class=\"impression\">";
       }
        break;
    case "pie":
        foreach($array as $j => $id){
            echo "<a id=\"lienMenu\" href=\"#menu\">Retour au menu</a>";
            genererPie("Json/".$j.".json", $id,false);
            echo "<br/><br/>";
            echo "<hr class=\"impression\">";
        }
        break;
 
    case "array":
        foreach($array as $j => $id){
            echo "<a id=\"lienMenu\" href=\"#menu\">Retour au menu</a>";
            genererTab("Json/".$j.".json", $id,false);
            echo "<br/><br/>";
            echo "<hr class=\"impression\">";
        }
        break;
    }
 
}