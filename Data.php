<?php
error_reporting (E_ALL ^ E_WARNING||E_NOTICE);
$data = file_get_contents("https://ojk-invest-api.vercel.app/api/illegals");
$Ojk = json_decode($data , true);

//echo "<pre>";print_r($ojk);

$table = "<h3> Data Otoritas Jasa Keuangan OJk </h3>";
$table .=
"<table border=1>
        <tr><td>No</td>
        <td>Nama PT</td>
        <td>Alamat</td>
        <td>Telephone</td>
        <td>Tipe</td>
        <td>Web</td></tr>";
for($i=0;$i<count($Ojk["data"]["illegals"]);$i++){

        if (empty(["data"]["illegals"][$i]["number"])){
         $display_number = null;
        }else
         for($p=0; $p<count($Ojk["data"]["illegals"][$i]["number"]);$p++){
        $display_number =$Ojk["data"]["illegals"][$i]["number"][$p];
        }
        if (empty(["data"]["illegals"][$i]["urls"])){
        $display_urls = null;
        }else
        for($z=0; $p<count($ojk["data"]["illegals"][$i]["urls"]);$z++){
         $display_urls =$Ojk["data"]["illegals"][$i]["urls"][$z];
        }

 $no=$i+1;
$table .= "<tr>
            <td>{$no}</td>
            <td>{$Ojk["data"]["illegals"][$i]["name"]}</td>
            <td>{$Ojk["data"]["illegals"][$i]["address"]}</td>
            <td>{$Ojk["data"]["illegals"][$i]["number"][0]}</td>
            <td>{$Ojk["data"]["illegals"][$i]["type"]}</td>
            <td>{$Ojk["data"]["illegals"][$i]["urls"][0]}</td>
            </tr>";
}
$table .="</table>";
echo $table;
?>