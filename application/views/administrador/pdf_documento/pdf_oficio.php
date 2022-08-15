<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body style=" 
  background-image: url('<?= base_url() ?>logm/membrete_rojas_quiroz.jpg');
  background-size: cover;
      background-repeat: no-repeat;
      margin: 0;
      height: 100vh;">

    <div style="margin-left:50px; margin-right:50px; margin-top:150px; margin-bottom:50px">
        <p style="font-size:13px; text-align:right;"><b>No. OFICIO:</b></p>
        <p style="margin-bottom:-15px; font-size:13px;"><b>C. <?= mb_strtoupper($usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno) ?></b></p>
        <p style="margin-bottom:-15px; font-size:13px;"><b><?= mb_strtoupper($usuario->nombre_unidad) ?> DEL H. AYUNTAMIENTO</b></p>
        <p style="margin-bottom:-90px; font-size:13px;"><b>DE <?= mb_strtoupper($municipio->NombreMunicipio) ?>, PUEBLA 2021-2024</b></p>
    </div>
    <br>
    <?php
    $t = 0;
    $a = 0;
    foreach ($actividad as $key => $value) :
        foreach ($ifoActividad as $key => $valueInfo) :
            if ($value->id_actividad_fecha == $valueInfo->id_actividad_fecha) {

                $programado = $value->cantidad_programada;
                $ejecutado = $valueInfo->indicador_realizado;
                $porcentajeTotal = 0;
                if ($programado == 0) {
                    $porcentajeTotal = 100;
                } else if ($programado > 0) {
                    $porcentajeTotal = ($ejecutado * 100  / $programado);
                } else {
                    $porcentajeTotal = ($ejecutado * 100  / 1);
                }
                $t = $t + $porcentajeTotal;
                $a = $a + 1; ?>

    <?php
            }
        endforeach;
    endforeach;
    if($t > 0){
        $total = ($t / $a);
    }else {
        $total = 0;
    }
    
    $status = '';
    if ($total >= 131) {
        $status = '<span style="color: green; font-weight: bold;">Bueno</span>';
    } else if ($total >= 106 && $total <= 500) {
        $status = '<span style="color: green; font-weight: bold;">Bueno</span>';
    } else if ($total >= 95 && $total <= 105) {
        $status = '<span style="color: green; font-weight: bold;">Bueno</span>';
    } else if ($total >= 80 && $total <= 94) {
        $status = '<span style="color: orange; font-weight: bold;">Regular</span>';
    } else if ($total <= 79) {
        $status = '<span style="color: red; font-weight: bold;">Malo</span>';
    }

    ?>
    <div style="margin-left:50px; margin-right:50px; margin-top:50px;">
        <p style="font-size:15px; text-align:justify;">El que suscribe Viridiana Sánchez Quiroz, representante legal de Rojas y Quiroz Contadores S.C., por este medio le envío un cordial saludo y al mismo tiempo le informo que para llevar a cabo un correcto seguimiento y desempeño de las funciones del Ayuntamiento, se ha llevado a cabo la contratación de este despacho para realizar el seguimiento al Desempeño por medio del Programas Presupuestarios 2022.</p>
        <p style="font-size:15px; text-align:justify;">Por lo que al verificar el estatus de la información subida respecto a la <?= mb_strtoupper($usuario->nombre_unidad) ?> debo informarle que su cumplimiento es: <?= $status ?></p>
        <?php 
            if($status == '<span style="color: green; font-weight: bold;">Bueno</span>'){ ?>
                <p style="font-size:15px; text-align:justify;">Por lo que agradezco su responsabilidad y cumplimiento ya que recibimos su información en el tiempo establecido y de manera completa, integrado por el reporte documental y fotográfico, contando así con su información mensual al corriente.</p>
                <p style="font-size:15px; text-align:justify;">Me despido de usted no sin antes realizar un recordatorio de seguir efectuando sus actividades correspondientes a su área en tiempo y forma, así mismo realizar el reporte en la plataforma SIRP los primeros 8 días de cada mes para seguir generando un trabajo de calidad para el Gobierno Municipal de <?= mb_strtoupper($municipio->NombreMunicipio) ?>.</p>
            <?php }
        ?>
    </div>
    <br>

                <div width="50%" style="margin-left:50px; margin-bottom:70px;">
                    <img style="width:200px;height:200px;" src="<?php echo $firma; ?>">
                </div>
                <div width="50%" style="text-align:center; margin-left:350px; margin-top:-300px;">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANQAAABqCAYAAADEHn8dAAAevUlEQVR4Ae3dCfRtU/0A8CdKNBiekAZjpkpSlCZkTJ4pkepRhEKalVQkMitDKiEUT0QpDTQY4xmeUCk0R2UsU6Vptz5n/b+/df7XHc793XvPvb/723utu84dztnDd572vjPSNGj/+te/0l13353uvfe+abDavMRhQmDGMAevc+yHH3kkPfDgg3UOmceahhCYNgz13//+dxqiNy+5bghMG4aqG7B5vOkJgcxQ0xPvedUDgkBmqAEBNnc7PSGQGWp64j2vekAQyAw1IMDmbqcnBDJDTU+851UPCAKZoQYE2Nzt9IRAZqjpife86gFBIDPUgACbu52eEMgMNT3xnlc9IAhkhhoQYHO30xMCmaGmCN7nzZuXbrzxxvSrX/0q3XLLLenvf//7FJn59JpmZqgpgO+dd945zZw5My2wwAJpnXXWSbNmzUq//OUvp8DMp98UM0ONOM533333tNFGG6U3vOEN6dRTT00/+clP0pw5c0Z81tN3epmhRhj373vf+9L666+fmHv33ntv+sc//jHCs81TA4HMUCNGB//+97/T3XffnY4//vj0kpe8JM2dOzcz0ojhqN10MkO1g07Nv9kE+YMf/CBts802afbs2enXv/51+tvf/lbzLPJwvUAgM1Qv0Ovzs1deeWV67Wtfm5ZYYomCmfrcfe6uBghkhqoByFWG+NGPfpTe8Y53FNG8b3zjG+nRRx+t8li+Z8QgkBlqBBAiv/SWt7wlLbvssuk3v/lNckpTblMTApmhhoy3a6+9NonmzTfffEVYfMjTycP3CIHMUD0CsJfHf/zjH6ePfexjaZNNNkk//OEP00MPPdRLd/nZEYBAZqghIUGC9pOf/GTabLPNkmBEbuMBgcxQQ8DjhRdemN797nen17zmNemLX/ziEGaQhxwUBDJDDQqyLfr99re/nRZddNG09NJLp69//etFErfFrfnrKQiBzFA1IU0FBD/pOc95TpoxY0baaqut0vXXX1/T6HmYuiCQGaoGSAs+iOQtt9xyaYsttkgHHnhguvPOOxMmy228IJAZasD4/PnPf54+9KEPFVrpve99bzr77LPTz372s8xMA4b7sLrPDDVAyIvkHXzwwWmhhRYqGOroo48uqsb/+c9/DnDU3PUwIZAZakDQ/9rXvpY23HDDtOCCCxblRBtssEGhmXIVxIAAPiLdZoYaACK+853vFEwk+MBvkm+ylyn7TAMA9oh1mRmqjwgRaPjqV7+anvGMZxQm3jOf+cz04Q9/ONfm9RHGo97V2DDUsKuzRfLe+c53pic+8YkFM9nT9OlPfzo98sgjo04DeX59hMCUZyg+yS9+8Yv0uc99bmhbHn7605+mfffdtzhEhZknNH7HHXdkE6+PhDpVuprSDHXbbbel008/vUiWLrzwwummm26qHe6qHd761remJzzhCWnJJZdMO+64Y/rtb3+bmal2TDQfMCKq//nPfyZ2P3s/qDZlGer3v/99YWLZ3UorIGab9Or8L92vfOUrEybeyiuvnI477rihaclBEcgo98s6CXz/+c9/TjfccEOx09mWmM9//vPptNNOS/vtt19685vfnLbffvu00047pT322KNIZRx77LHpyCOPTHKDXocffniCz+9+97vpy1/+cjr//PMTxus2kDQlGQrw3v/+9xf1cJjJa8UVVyyO2KqLABS4PutZzyrGftGLXlRUPwRy65rDdBvn4YcfTvfdd19Rna8mUo7PLuett946vfzlLy+ODiBYF1tssQIvQRuNV6kM+8+8nHXo5Z4nP/nJ6WlPe9rEs/rEdJdeemllUE85hvrd735XVGqvsMIKiZkXwDjkkEMqL7rXG7///e+n5ZdfPu25557poIMOKk5yDdOi177z84+FgFNyr7vuusIieeELX1gUFz/pSU+awH2ZYQSFFB4/9alPTXJ/73nPe9Ib3/jGtOWWW6ZjjjmmSGEceuih6Utf+lJxvuHJJ5+cLrjggnTFFVck6Y7vfe97SQ7xpS99acFgj3vc4wpGpe2qtCnDUKJlN998cwEsBaYkk815pM3znve8dP/991dZb8/3QOzTn/70wm/6wx/+UEjMbs2CnicxjTq45557CkLHQGXG8V56gqntEFDaitl21llnJeVet99+e3GcAFA5lg3tdNP+9Kc/FVbQq171qmRs2usLX/hCxy6mBEM5y5vqRcgAKYpGar3iFa8oPq+11lrpr3/9a8fF9nKDgAe7e6WVVipMCiHx3AYLATuYDzjggLTIIosUeGaV0FDbbbddYWJfcsklifn/l7/8peNEJmNB8NEITYyE7vhjnYTnyDOUM7yd7Q2opNEHPvCBxJamqpl8XlT1IJtoogLXxz/+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" alt="imagen">
                    <p style="margin-bottom:-15px; margin-top:-20px; font-size:14px;"><b>CP. Viridiana Sánchez Quiroz</b></p>
                    <p style="margin-bottom:-15px; font-size:14px;"><b>representante legal Rojas y</b></p>
                    <p style="margin-bottom:-15px; font-size:14px;"><b>Quiroz contadores</b></p>
                </div>

</body>

</html>