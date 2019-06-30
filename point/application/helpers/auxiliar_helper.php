<?php
function cor_box($i){
    if ($i == 1){
        $cor = "bg-aqua-active";
     }else if ($i == 2){
        $cor = "bg-green";
     }else if ($i == 3){
        $cor = "bg-red";
     }else if ($i == 4){
        $cor = "bg-purple";
     }
     return $cor;
}


function foto_perfil_usuario($foto, $sexo){
    if(empty($foto)){
        if ($sexo == 'M'){
            $foto = 'homem.png';
        }else if ($sexo == 'F'){
            $foto = 'mulher.png';
        }
        return $foto;
    }else{
        return $foto;
    }
}
function dias($dia){
    $semana = array("Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado");
    return $semana[$dia];
}

function converter_data_br($date){
    $dateExpl = explode('-', $date);
    return $dateExpl[2].'/'.$dateExpl[1].'/'.$dateExpl[0];
}

function converter_data_us($date){
    $dateExpl = explode('/', $date);
    return $dateExpl[2].'-'.$dateExpl[1].'-'.$dateExpl[0];
}

function converter_checkbox_texto($dados){
    $text = '';
    if(!empty($dados)){
        for($i=0; $i< count($dados); $i++){
            if($i == 0){
                $text .= trim($dados[$i]);
            }else{
                $text .= ','.trim($dados[$i]);
            }
        }
    }
    return $text;
}

function converter_texto_array($text){
    $dados = explode(',', $text);
    return $dados;
}

function converter_data_bra($data){
    $data = explode('-', $data);
    return "$data[2]/$data[1]/$data[0]";
}

function formato_dinheiro_usa($valor){
    $valor1 = str_replace('.','', $valor);
    $valor2 = str_replace(',','.', $valor1);
    return $valor2;
}

function formato_dinheiro_bra($valor){
    $valor1 = number_format($valor, 2, ',', '.');
    return $valor1;
}


function info_evento($data_inicio, $data_fim, $hora_inicio, $hora_fim){
    if($data_inicio == $data_fim){
        $text = converter_data_bra($data_inicio).", $hora_inicio às $hora_fim";
    }else{
        $text = converter_data_bra($data_inicio).' à '.converter_data_bra($data_fim)." , $hora_inicio às $hora_fim";
    }
    return $text;
}

function info_vagas($vagas, $total){
    if($vagas == $total){
        $text = "Vagas: $vagas, Esgotado";
    }else{
        $livres = $vagas - $total;
        $text = "Vagas: $vagas, Disp.: $livres ";
    }
    return $text;
}

?>