<?php 
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */

 $datetoday = $this->Helpers->load('Dates');
?>
<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Mapa del sitio', 
                                array('controller'=>'pages','action'=>'mapa'),
				array('title'=>'Mapa del Sitio','escape' => false));
       ?>
</div><br><br>

<table border="0">
 <tr>
  <td width="4%" align="center">
   <?php echo $this->Html->image("icons/icon_view.png",array("width"=>"28px","height"=>"28px","border"=>"0")); ?>
  </td>
  <td width="55%"><h1>Mapa del Sitio<h1></td>
 </tr>
</table>



<h6 style="float:right;"><?php echo $datetoday->fechaActual(); ?></h6>
<table border="0" class="cuadrocafe2">
 <tr>
  <td align="center">
   <table border="1">
    <tr>
     <td align="center">
     </td>
     <td align="center">
     </td>
     <td align="center">
     </td>
    </tr>
   </table>
  </td>
 </tr>
</table>




<table width="960" cellpadding="0" cellspacing="0">      
 <tr>
          <td align="center" valign="top"><table width="930" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
            <tr>
              <td width="713" align="center" valign="top"><table width="700" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                
                <tr>
                  <td><table width="700" border="0" cellpadding="1" cellspacing="0" bordercolor="#EDEFF4" class="cuadroblue2mapeo">
                    <tr>
                      <td align="left" valign="top"><table width="700" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadrobluemapeo">
                          <tr>
                            <td align="left" valign="middle"><table width="680" border="0" cellpadding="0" cellspacing="0">
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="right" valign="middle"><table width="415" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="94" align="left" valign="top"><table width="90" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                          <tr>
                            <td width="53" align="center" valign="middle"><span class="titulopsec">Imprimir</span></td>
                            <td width="21" align="left" valign="middle">
	<?php
         echo $this->Html->link(
                $this->Html->image("icons/imprimir.gif", 
				   array("width"=>"21px","height"=>"18px","border"=>"0")),
                                   'javascript:window.print();',
				   array('title'=>'Imprimir','escape' => false)); 

	?>
			   </td>
                          </tr>
                      </table></td>
                      <td width="222" align="left" valign="top"></td>
                          </tr>
                      </table></td>
                      <td width="99" align="left" valign="top"><table width="89" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="center" valign="top"><table width="700" border="0" cellpadding="1" cellspacing="0" bordercolor="#CCCCCC" class="cuadrogris">
                    <tr>
                      <td width="700" align="center"><table width="680" border="0" cellpadding="0" cellspacing="0" class="acuerdoslog">
                          <tr>
                            <td width="680" align="center" valign="top"><table width="680" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                              <tr>
                                <td height="5" colspan="2"></td>
                              </tr>
                              <tr>
                                <td colspan="2"><table width="300" border="0" cellpadding="0" cellspacing="0" id="contenido">
                                </table></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="348" align="left" valign="top"><table width="350" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                    <tr>
                                      <td colspan="2" align="left" valign="middle"><table width="300" border="0" cellpadding="0" cellspacing="0">
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../tribunal/bienvenida.php" class="menumap" >Bienvenida</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../tribunal/directorio.php" class="menumap" >Directorio</a></td>
                                    </tr>
                                    <tr>
                                      <td width="39">&nbsp;</td>
                                      <td width="274">- <a href="../tribunal/directorio_nombre.php" class="menumap">Consultar directorio telef&oacute;nico por nombre</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../tribunal/directorio_ubi_depto.php" class="menumap">Consultar directorio telef&oacute;nico por ubicaci&oacute;n y departamento</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../tribunal/directorio_depto.php" class="menumap">Consultar directorio telef&oacute;nico por departamento</a></td>
                                    </tr>
                                    
                                    <tr>
                                      <td colspan="2">&bull; <a href="../tribunal/organigrama.php" class="menumap">Organigrama</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../tribunal/historia.php" class="menumap">Historia</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../tribunal/ubicacion.php" class="menumap">Ubicaci&oacute;n</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../tribunal/division_territorial.php" class="menumap">Divisi&oacute;n territorial</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../tribunal/zona_norte.php" class="menumap">Zona norte</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../tribunal/zona_oriente.php" class="menumap">Zona oriente</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../tribunal/zona_centro.php" class="menumap">Zona centro</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../tribunal/zona_sur.php" class="menumap">Zona sur</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../tribunal/zona_sur_oriente.php" class="menumap">Zona sur-oriente</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../tribunal/galeria.php" class="menumap">Galer&iacute;a de fotos</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../tribunal/preguntas_frecuentes.php" class="menumap">Preguntas frecuentes</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                </table></td>
                                <td width="326" rowspan="4" align="left" valign="top"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                    <tr>
                                      <td colspan="2"><table width="255" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td><a href="../actividades_del_tribunal/index.php" class="semefo">Actividades del Tribunal </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../actividades_del_tribunal/registro_de_titulos.php" class="menumap">Registro de t&iacute;tulos (requisitos)</a></td>
                                    </tr>
                                    <tr>
                                      <td width="37">&nbsp;</td>
                                      <td width="447">- <a href="../actividades_del_tribunal/registrodetitulos.php" class="menumap">Consultar el registro de t&iacute;tulos</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td width="204"><a href="../actividades_del_tribunal/index.php" class="semefo">Oficial&iacute;a </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../actividades_del_tribunal/actividades_o.php" class="menumap">Actividades</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../actividades_del_tribunal/notificaciones.php" class="menumap">Notificaciones </a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../actividades_del_tribunal/ubicacion_o.php" class="menumap">Ubicaci&oacute;n</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../actividades_del_tribunal/preguntas_frecuentes.php" class="menumap">Preguntas frecuentes</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td width="204"><a href="../actividades_del_tribunal/juzgado-exhortos.php" class="semefo">Juzgado de Exhortos </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../actividades_del_tribunal/juzgado-exhortos.php" class="menumap">Juzgado de Exhortos</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../actividades_del_tribunal/notificaciones.php" class="menumap">Exhortos </a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../actividades_del_tribunal/guia-tramitacion.php" class="menumap">Gu\EDa para tramitaci\F3n y b\FAsqueda de un Exhorto</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                          <td width="204"><a href="../central-de-diligenciarios/index.php" class="semefo">Central de Diligenciarios</a></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../central-de-diligenciarios/presentacion.php" class="menumap">Presentaci\F3n</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../central-de-diligenciarios/estructura-organica.php" class="menumap">Estructura Org\E1nica</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../central-de-diligenciarios/oficialia.php" class="menumap">Oficial\EDa</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../central-de-diligenciarios/area-de-enrutamiento.php" class="menumap">\C1rea De Enrutamiento</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../central-de-diligenciarios/area-de-asociado-en-la-parte-actora.php" class="menumap">\C1rea de Asociado de la Parte Actora</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../central-de-diligenciarios/cumplimiento-a-las-atribuciones-y-obligaciones.php" class="menumap">Cumplimiento a las Atribuciones y Obligaciones</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../central-de-diligenciarios/boleta-de-cita.php" class="menumap">Boleta de Cita</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                          <td width="204"><a href="../archivo-judicial/index.php" class="semefo">Archivo Judicial</a></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../archivo-judicial/antecedentes.php" class="menumap">Antecedentes</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../archivo-judicial/mision.php" class="menumap">Misi\F3n y Visi\F3n</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../archivo-judicial/servicios.php" class="menumap">Servicios</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../archivo-judicial/requisitos.php" class="menumap">Requisitos para Consulta</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../archivo-judicial/requisitos-y-formatos.php" class="menumap">Requisitos y Formatos para el Envi\F3 de Informaci\F3n de Juzgados, Salas para su Resguardo</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../archivo-judicial/normatividad.php" class="menumap">Normatividad</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../archivo-judicial/contacto.php" class="menumap">Contacto</a></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                  <tr>
                                    <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                          <td width="204"><a href="http://transparencia.htsjpuebla.gob.mx/" class="semefo">Transparencia </a></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&bull; <a href="http://transparencia.htsjpuebla.gob.mx/modulo-de-transparencia/" class="menumap">M&oacute;dulo de Transparencia</a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&bull; <a href="http://transparencia.htsjpuebla.gob.mx/funciones/" class="menumap">Funciones</a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&bull; <a href="http://transparencia.htsjpuebla.gob.mx/ley-de-transparencia/" class="menumap">Ley de Transparencia y Acceso a la Informaci&oacute;n P&uacute;blica del Estado de Puebla</a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&bull; <a href="http://transparencia.htsjpuebla.gob.mx/directorio/" class="menumap">Directorio</a></td>
                                  </tr>
                                  <tr>
                                    <td width="41">&nbsp;</td>
                                    <td width="259">- <a href="http://transparencia.htsjpuebla.gob.mx/directorio-ubicacion/" class="menumap">Consulta de Directorio por Ubicaci&oacute;n y Departamento</a></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>- <a href="http://transparencia.htsjpuebla.gob.mx/directorio-departamento/" class="menumap">Consulta de Directorio por Departamento</a></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>- <a href="http://transparencia.htsjpuebla.gob.mx/directorio-nombre/" class="menumap">Consulta por Nombre</a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&bull; <a href="http://transparencia.htsjpuebla.gob.mx/ubicacion/" class="menumap">Ubicaci&oacute;n</a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&bull; <a href="http://transparencia.htsjpuebla.gob.mx/enviar-solicitud/" class="menumap">Enviar Solicitud de Informaci&oacute;n</a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&bull; <a href="http://transparencia.htsjpuebla.gob.mx/quejas-sugerencias/" class="menumap">Enviar Queja &oacute; Sugerencia</a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                        <td width="204"><a href="../sabias-que/sabias-que.php" class="semefo">Sab\EDas que</a></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&bull; <a href="../sabias-que/sabias-que.php" class="menumap">Concentrado General</a></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td><table width="242" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                          <td width="204"><a href="../centro_de_mediacion/index.php" class="semefo">Centro Estatal de Mediaci&oacute;n</a> </td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td>&bull; <a href="../centro_de_mediacion/filosofia_cm.php" class="menumap">Filosof&iacute;a</a></td>
                                  </tr>
                                  <tr>
                                    <td>&bull; <a href="../centro_de_mediacion/composicion_cm.php" class="menumap">Composici&oacute;n</a></td>
                                  </tr>
                                  <tr>
                                    <td>&bull; <a href="../centro_de_mediacion/estadisticas_cm.php" class="menumap">Estad&iacute;sticas</a></td>
                                  </tr>
                                  <tr>
                                    <td>&bull; <a href="../centro_de_mediacion/ubicacion_cm.php" class="menumap">Ubicaci&oacute;n</a></td>
                                  </tr>
                                  <tr>
                                    <td>&bull; <a href="../centro_de_mediacion/preguntas_frecuentes_cm.php" class="menumap">Preguntas frecuentes</a></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td width="204"><a href="../biblioteca_virtual/index.php" class="semefo">Biblioteca Virtual </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../biblioteca_virtual/legislacion.php" class="menumap">Legislaci&oacute;n</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../biblioteca_virtual/biblioteca_fisica.php" class="menumap">Biblioteca f&iacute;sica</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../biblioteca_virtual/bibliotecafisica.php" class="menumap">Listado de biblioteca f&iacute;sica</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../biblioteca_virtual/glosario_de_terminos.php" class="menumap">Glosario de t&eacute;rminos</a></td>
                                    </tr>
                                    <tr>
                                      <td width="38">&nbsp;</td>
                                      <td width="446">- <a href="../biblioteca_virtual/glosario_de_terminos_full.php" class="menumap">Consultar el glosario de t&eacute;rminos completo</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                </table></td>
                                <td align="left" valign="top"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                    <tr>
                                      <td><table width="242" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td width="204"><a href="../publicaciones_internas/index.php" class="semefo">Publicaciones Internas </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../publicaciones_internas/revista_axioma.php" class="menumap">Revista axioma</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../publicaciones_internas/el_observador_judicial.php" class="menumap">El observador judicial</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../publicaciones_internas/codigo_de_procedimientos_civiles.php" class="menumap">C&oacute;digo de procedimientos civiles</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../publicaciones_internas/codigo_de_etica.php" class="menumap">C&oacute;digo de &eacute;tica</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                    <tr>
                                      <td width="400"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td width="204"><a href="../estadisticas/index.php" class="semefo">Estad&iacute;sticas </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/antecedentes_e.php" class="menumap">Antecedentes</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/concentrado_mensual_ep.php" class="menumap">Concentrado mensual</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/delitos_pormenorizados_ep.php" class="menumap">Delitos pormenorizados</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/adolescentes_ep.php" class="menumap">Adolescentes</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/sentencias_civil_ep.php" class="menumap">Sentencias civil</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/sentencias_familiar_ep.php" class="menumap">Sentencias familiar</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/sentencias_penal_ep.php" class="menumap">Sentencias penal</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/juzgados_p_i_m_ep.php" class="menumap">Juzgados de paz, ind&iacute;genas y municipales</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td><table width="300" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="27"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td width="357"><a href="../estadisticas/index.php" class="semefo">Departamento de control y evaluaci&oacute;n de proyectos </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/actividades_ep.php" class="menumap">Actividades</a></td>
                                    </tr>
                                    <tr>
                                      <td>&bull; <a href="../estadisticas/preguntas_ep.php" class="menumap">Preguntas frecuentes</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                    </tr>
                                </table></td>
                                <td align="left" valign="top"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td width="204"><a href="../prensa_y_difusion/index.php" class="semefo">Prensa </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../prensa_y_difusion/noticias_p.php" class="menumap">Noticias</a></td>
                                    </tr>
                                    <tr>
                                      <td width="46">&nbsp;</td>
                                      <td width="454">- <a href="../prensa_y_difusion/concentrado_noticias.php" class="menumap">Archivo de noticias</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../prensa_y_difusion/entrevistas.php" class="menumap">Entrevistas y Reportajes</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../prensa_y_difusion/medios_de_comunicacion_p.php" class="menumap">Medios de comunicaci&oacute;n</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                          <td width="204"><a href="../voluntariado/index.php" class="semefo">Voluntariado </a></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../voluntariado/filosofia.php" class="menumap">Filosof\EDa</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../voluntariado/noticias.php" class="menumap">Noticias</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../voluntariado/programas.php" class="menumap">Programas</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../voluntariado/peventos.php" class="menumap">Pr\F3ximos Eventos</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../voluntariado/preguntas-frecuentes.php" class="menumap">Preguntas Frecuentes</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../voluntariado/ubicacion.php" class="menumap">Ubicaci\F3n</a></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td width="204"><a href="../instituto_de_estudios_judiciales/index.php" class="semefo">Instituto de Estudios Judiciales </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../instituto_de_estudios_judiciales/acerca_de_nosotros.php" class="menumap">Acerca de Nosotros</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/introduccion.php" class="menumap">Introducci\F3n</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/justificacion.php" class="menumap">Justificaci\F3n</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/mision.php" class="menumap">Misi\F3n</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/vision.php" class="menumap">Visi\F3n</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/valores.php" class="menumap">Valores</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/organigrama.php" class="menumap">Organigrama</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../instituto_de_estudios_judiciales/comunicacion_social.php" class="menumap">Comunicaci\F3n Social</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/juicio_sumario.php" class="menumap">Juicio Sumario</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/servicio_social.php" class="menumap">Servicio Social</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/convenios.php" class="menumap">Convenios</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../instituto_de_estudios_judiciales/servicios_escolares.php" class="menumap">Servicios Escolares</a></td>
                                    </tr>
                                    <tr>
                                      <td width="38">&nbsp;</td>
                                      <td width="446">- <a href="../instituto_de_estudios_judiciales/kardex.php" class="menumap">K\E1rdex</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/inscripcion_a_cursos.php" class="menumap">Inscripci\F3n a Cursos</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/reglamento_alumnos.php" class="menumap">Reglamento Alumnos</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../instituto_de_estudios_judiciales/calidad_en_la_educacion.php" class="menumap">Calidad en la Educaci\F3n</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/deteccion_necesidades.php" class="menumap">Detecci\F3n de Necesidades de Capacitaci\F3n</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/estadisticas.php" class="menumap">Estad\EDsticas</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../instituto_de_estudios_judiciales/estructurasp_educativos.php" class="menumap">Estructuras y Programas Educativos</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/modelo_academico.php" class="menumap">Modelo Acad\E9mico</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/areas_capacitacion.php" class="menumap">\C1reas de Capacitaci\F3n</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/oferta_academica.php" class="menumap">Oferta Acad\E9mica</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/claustro_docente.php" class="menumap">Claustro Docente</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/reglamentos.php" class="menumap">Reglamentos</a></td>
                                    </tr>
                                    
                                    <tr>
                                      <td colspan="2">&bull; <a href="../instituto_de_estudios_judiciales/calendariocursos_actividades.php" class="menumap">Calendario de Cursos y Actividades</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/programacion_cursos.php" class="menumap">Programaci\F3n de Cursos</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../instituto_de_estudios_judiciales/actividades.php" class="menumap">Actividades</a></td>
                                    </tr>
                                    
                                    <tr>
                                      <td colspan="2">&bull; <a href="../instituto_de_estudios_judiciales/biblioteca.php" class="menumap">Biblioteca</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../instituto_de_estudios_judiciales/sitios_interes.php" class="menumap">Sitios de Inter\E9s</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../instituto_de_estudios_judiciales/preguntas_frecuentes.php" class="menumap">Preguntas Frecuentes</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                </table></td>
                                <td align="left" valign="top"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                            <td width="204"><a href="../semefo/index.php" class="semefo">Servicio M&eacute;dico Forense </a></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../semefo/acerca_semefo.php" class="menumap">Acerca de nosotros</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../semefo/ausente.php" class="menumap">Declaraci&oacute;n de ausente</a></td>
                                    </tr>
                                    <tr>
                                      <td width="38">&nbsp;</td>
                                      <td width="446">- <a href="../semefo/ver_solo_hombres.php" class="menumap">Consultar solo sexo masculino</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../semefo/ver_solo_mujeres.php" class="menumap">Consular solo sexo femenino</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../semefo/estadisticas_semefo.php" class="menumap">Estad&iacute;sticas</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../semefo/reportes_semefo.php" class="menumap">SEMEFO informa</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../semefo/reportes_semefo_h.php" class="menumap">Consultar solo sexo masculino</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../semefo/reportes_semefo_m.php" class="menumap">Consular solo sexo femenino</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../semefo/preguntas_frecuentes_semefo.php" class="menumap">Preguntas frecuentes</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                        <tr>
                                          <td><table width="242" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                                <td width="204"><a href="../../../virtual/" class="semefo">Expediente Virtual</a> </td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><table width="242" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                          <td width="204"><a href="../../consultas/" class="semefo">Kiosco Virtual</a> </td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../../consultas/" class="menumap">Oficial\EDas Comunes</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../../consultas/demandasciviles/inicio" class="menumap">Demandas Civiles</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../../consultas/demandasfamiliares/inicio" class="menumap">Demandas Familiares</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../../consultas/apelacionesciviles/inicio" class="menumap">Apelaciones Civiles</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>- <a href="../../consultas/apelacionesfamiliares/inicio" class="menumap">Apelaciones Familiares</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../../diligenciarios/bitacoras/index" class="menumap">Central de Diligenciarios</a></td>
                                      </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&bull; <a href="../../exhortos/consultas/" class="menumap">Consulta de Exhortos
		</a></td>
                                      </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><table width="300" border="0" cellpadding="0" cellspacing="0" class="arial12violeta">
                                        <tr>
                                          <td><table width="242" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="22"><img src="../../filesec/seccionpage/folder_icon.png" width="15" height="18"></td>
                                                <td width="204"><a href="../../proteccion_civil.php" class="semefo">Protecci&oacute;n Civil</a> </td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>                </td>
              <td width="201" align="right" valign="top"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#CCCCCC" class="cuadrogris">
                        
                        <tr>
                          <td align="center" valign="top"><table width="170" border="0" cellpadding="0" cellspacing="0">
                            
                            <tr>
                              <td align="left" valign="top"></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                                  <tr onmouseover='this.style.background="#F1F1F2"' onmouseout='this.style.background="white"'>
                                    <td align="left" valign="top"><table width="180" >
                                        <tr border="0" cellpadding="0" cellspacing="0">
                                          <td width="15" align="center" valign="middle"><img src="../../filesec/seccionpage/option.gif" width="5" height="5"></td>
                                          <td align="left" valign="middle"><a href="utilidades.php" class="menuhtsjpuebla">Utilidades </a></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                                  <tr onmouseover='this.style.background="#F1F1F2"' onmouseout='this.style.background="white"'>
                                    <td align="left" valign="top"><table width="180" >
                                        <tr border="0" cellpadding="0" cellspacing="0">
                                          <td width="15" align="center" valign="middle"><img src="../../filesec/seccionpage/option.gif" width="5" height="5"></td>
                                          <td align="left" valign="middle"><a href="contacto.php" class="menuhtsjpuebla">Contacto</a></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                                  <tr onmouseover='this.style.background="#F1F1F2"' onmouseout='this.style.background="white"'>
                                    <td align="left" valign="top"><table width="180" >
                                        <tr border="0" cellpadding="0" cellspacing="0">
                                          <td width="15" align="center" valign="middle"><img src="../../filesec/seccionpage/option.gif" width="5" height="5"></td>
                                          <td align="left" valign="middle"><a href="derechos_reservados.php" class="menuhtsjpuebla">Derechos Reservados</a></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                                  <tr onmouseover='this.style.background="#F1F1F2"' onmouseout='this.style.background="white"'>
                                    <td align="left" valign="top"><table width="180" >
                                        <tr border="0" cellpadding="0" cellspacing="0">
                                          <td width="15" align="center" valign="middle"><img src="../../filesec/seccionpage/option.gif" width="5" height="5"></td>
                                          <td align="left" valign="middle"><a href="politica_de_privacidad.php" class="menuhtsjpuebla">Pol\EDtica de Privacidad</a></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                                  <tr onmouseover='this.style.background="#F1F1F2"' onmouseout='this.style.background="white"'>
                                    <td align="left" valign="top"><table width="180" >
                                        <tr border="0" cellpadding="0" cellspacing="0">
                                          <td width="15" align="center" valign="middle"><img src="../../filesec/seccionpage/option.gif" width="5" height="5"></td>
                                          <td align="left" valign="middle"><a href="acerca_redes_sociales.php" class="menuhtsjpuebla">Acerca de Las Redes Sociales</a></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="5" align="center" valign="top"></td>
                    </tr>                  
                    <tr>
                      <td height="5" align="left" valign="top"></td>
                    </tr>
                    <tr>
                      <td width="180" height="80" align="center" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#CCCCCC" class="cuadrogris">
                        <tr>
                          <td align="left" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                              <tr>
                                <td align="left" valign="top"><table width="180" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                   <td width="180" height="80" align="left" valign="top"><script language="JavaScript" src="../../javas/banners_page/banner_img_portada1_2_sec.js" type="text/javascript"></script></td>
                                  </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="5" align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td width="180" height="80" align="center" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#CCCCCC" class="cuadrogris">
                        <tr>
                          <td align="left" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                              <tr>
                                <td align="left" valign="top"><table width="180" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="180" height="80" align="left" valign="top"><script language="JavaScript" src="../../javas/banners_page/banner_img_portada2_2_sec.js" type="text/javascript"></script></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td  height="5" align="center" valign="top"></td>
                    </tr>
                    <tr>
                      <td width="180" height="80" align="center" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#CCCCCC" class="cuadrogris">
                        <tr>
                          <td align="left" valign="top"><table width="180" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                              <tr>
                                <td align="left" valign="top"><table width="180" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="180" height="80" align="left" valign="top">
                                      <script language="javascript" src="../../javas/banners_page/bannerflash_sec.js"></script>                                     </td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td  height="5" align="center" valign="top"></td>
                    </tr>
                                </table>
                </div></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="940" height="100" align="center" valign="bottom" background="../../filesec/seccionpage/line_down.jpg"><table width="900" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="65" align="center" valign="middle"><p><a href="../tribunal/index.php" class="menudownpage">Tribunal</a></p></td>
              <td width="159" align="center" valign="middle"><p><a href="../actividades_del_tribunal/index.php" class="menudownpage">Actividades del tribunal</a></p></td>
              <td width="108" align="center" valign="middle"><p><a href="../transparencia/index.php" class="menudownpage">Transparencia</a></p></td>
              <td width="143" align="center" valign="middle"><p><a href="../centro_de_mediacion/index.php" class="menudownpage">Centro de mediaci&oacute;n</a></p></td>
              <td width="110" align="center" valign="middle"><p><a href="../biblioteca_virtual/index.php" class="menudownpage">Biblioteca virtual</a></p></td>
              <td width="157" align="center" valign="middle"><p><a href="../publicaciones_internas/index.php" class="menudownpage">Publicaciones internas</a></p></td>
              <td width="79" align="center" valign="middle"><p><a href="../estadisticas/index.php" class="menudownpage">Estad&iacute;sticas</a></p></td>
              <td width="79" align="center" valign="middle"><p><a href="../prensa_y_difusion/index.php" class="menudownpage">Prensa</a></p></td>
            </tr>
            <tr>
              <td colspan="8" align="center" valign="middle"><table width="900" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="140" align="center" valign="middle"><a href="../principal/derechos_reservados.php" class="menudownpage">Derechos reservados 2011</a></td>
                  <td width="631" align="center" valign="middle" class="sitiodownpage">Sitio Optimizado para pantallas de 1024 X 768</td>
                  <td width="129" align="center" valign="middle"><a href="../principal/politica_de_privacidad.php" class="menudownpage">Pol&iacute;tica de privacidad</a></td>
                </tr>
                <tr>
                  <td height="5" colspan="3" align="left" valign="middle">&nbsp;</td>
                  </tr>
              </table></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="940" height="3" align="left" valign="top" background="../../filesec/seccionpage/small_line_down.jpg"><img src="../../filesec/seccionpage/small_line_down.jpg" width="2" height="3" /></td>
        </tr>
        <tr>
          <td align="left" valign="top"><table width="940" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="940" colspan="2" align="center" valign="middle"><table width="920" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" class="cuadroblanco">
                <tr>
                  <td width="460" align="left" valign="middle"><table width="438" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="70" rowspan="5" align="center" valign="middle"><img src="../../filesec/seccionpage/htsjpuebla_small.jpg" width="70" height="80"></td>
                      <td width="15" rowspan="5" align="center" valign="middle">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="353" align="left" valign="top" class="footpage"><div align="justify"><strong>CIUDAD JUDICIAL SIGLO XXI</strong></div></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="footpage"><strong>Direcci&oacute;n Ciudad Judicial Siglo XXI:</strong> Perif&eacute;rico Ecol&oacute;gico Arco Sur No. 4000 San Andr&eacute;s Cholula, Puebla. Reserva Territorial Atlixcayotl.<br>
                        <strong>Tel&eacute;fono Ciudad judicial </strong><strong>Siglo XXI:</strong> (222) 223 84 00</td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="footpage">&copy;2011 Honorable Tribunal Superior de Justicia del Estado de Puebla  |  Poder Judicial del Estado de Puebla.</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                  <td width="284" align="center" valign="top"><table width="255" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle"><strong class="footpage">PALACIO DE JUSTICIA</strong></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top"><div align="justify"><span class="footpage"><strong>Direcci&oacute;n Palacio de Justicia:</strong> 5 Oriente n&uacute;mero 9 <strong>Colonia</strong>:Centro Hist&oacute;rico<br>
                                <strong>Tel&eacute;fono Palacio de Justicia:</strong> (222) 229-66-00<br>
                                <strong>C.P:</strong>72000</span></div></td>
                    </tr>
                  </table></td>
                  <td width="162" align="center" valign="middle"><table width="145" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="145" align="center">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              </tr>
            
          </table></td>
        </tr>
      </table>      </td>
      <td width="10" align="left" valign="top" background="../../filesec/seccionpage/m_der.jpg"><img src="../../filesec/seccionpage/m_der.jpg" width="10" height="5" /></td>
    </tr>
    <tr>
      <td width="10" height="15" align="left" valign="top" background="../../filesec/seccionpage/m_izq.jpg"><img src="../../filesec/seccionpage/m_izq2.jpg" width="10" height="15" /></td>
      <td height="15" align="left" valign="top" background="../../filesec/seccionpage/m_down.jpg"><img src="../../filesec/seccionpage/m_down.jpg" width="10" height="15" /></td>
      <td><img src="../../filesec/seccionpage/m_der2.jpg" width="10" height="15" /></td>
    </tr>
    <tr>
      <td height="5" colspan="3" align="left" valign="top" bgcolor="#FFFFFF"></td>
    </tr>
  </table>
