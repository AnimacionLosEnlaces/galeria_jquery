// JavaScript Document

	//Obtenemos el ID de la capa donde meteremos todos los datos
    var showData = $('#cats-container');
	var showData2 = $('#portfolio');
	//Cargamos los valores desde el archivo json
    $.getJSON('json/data.json', function (data) {
      //console.log(data);
	
	  //Por cada categoría añadimos un elemento
      data.categorias.map(function (item) {
         //Cremos el código que debe añadirse
		 var content = '<li><a href="#" data-filter="' + item.filter + '">' + item.texto + '</a></li>';
		 //Lo añadimos al contenedor
         showData.append(content);
		
      });
	  //Vaciamos el contenedor
	  showData2.empty();
	  //Por cada imagen ponemos un item
      data.images.map(function (item) {
        //console.log(item.file);
		 var content = '<article class="portfolio-item ' + item.cat + '">' +
                            '<div class="portfolio-image">' +
                                '<a href="#">' +
                                    '<img src="images/gallery/thumb/' + item.file + '" alt="' + item.titulo + '">' +
                                '</a>' +
                                '<div class="portfolio-overlay">' +
                                    '<a href="images/gallery/full/' + item.file + '" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>' +
                                '</div>' +
                            '</div>' +
                            '<div class="portfolio-desc">' +
                                '<h3><a href="images/gallery/full/' + item.file + '" data-lightbox="image">' + item.titulo + '</a></h3>' +
                                '<span><a href="images/gallery/full/' + item.file + '" data-lightbox="image"' + item.subtitulo + '</a></span>' +
                            '</div>' +
                        '</article>';
        showData2.append(content);
		
      });
	  
	  

    });

    showData2.text('Loading the JSON file.');

