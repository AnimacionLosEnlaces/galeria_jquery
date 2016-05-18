<?php
//Cargamos los archivos xml con las categorias y las imagenes
$xml_file_cats = "xml/cats.xml";
$xml_file_images = "xml/images.xml";
//$xml = "";

//Si los archivos existen, lo cargamos
if(file_exists($xml_file_cats) && file_exists($xml_file_images) ) 
{
    $xml_cats = simplexml_load_file($xml_file_cats);    
    $xml_images = simplexml_load_file($xml_file_images);    
}
else
{
    die('error: el archivo xml no existe');
}

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="charset" content="utf-8">
    <!-- Stylesheets
    ============================================= -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <title>Galer&iacute;a de fotos</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        
        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Gallery Filter
                    ============================================= -->
                    <ul class="portfolio-filter clearfix" data-container="#portfolio">

                        <li class="activeFilter"><a href="#" data-filter="*">Mostrar todas</a></li>
                        <?php foreach($xml_cats AS $value) : ?>
                        
                        <li><a href="#" data-filter="<?php echo $value->filter ?>"><?php echo $value->nombre ?></a></li>
                        <?php endforeach ?>
                        
                    </ul><!-- #gallery-filter end -->

                    <div class="portfolio-shuffle" data-container="#portfolio">
                        <i class="icon-random"></i>
                    </div>

                    <div class="clear"></div>

                    <!-- Gallery Items
                    ============================================= -->
                    <div id="portfolio" class="portfolio grid-container clearfix">

                        <?php foreach($xml_images AS $value) : ?>
                        <article class="portfolio-item <?php echo $value->cat ?>">
                            <div class="portfolio-image">
                                <a href="#">
                                    <img src="images/gallery/thumb/<?php echo $value->file ?>" alt="<?php echo $value->titulo ?>">
                                </a>
                                <div class="portfolio-overlay">
                                    <a href="images/gallery/full/<?php echo $value->file ?>" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-desc">
                                <h3><a href="images/gallery/full/<?php echo $value->file ?>" data-lightbox="image"><?php echo $value->titulo ?></a></h3>
                                <span><a href="images/gallery/full/<?php echo $value->file ?>" data-lightbox="image"><?php echo $value->subtitulo ?></a></span>
                            </div>
                        </article>
                        
                        <?php endforeach ?>
                    </div><!-- #gallery end -->

                </div>

            </div>

        </section><!-- #content end -->

        
    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="js/functions.js"></script>

</body>
</html>