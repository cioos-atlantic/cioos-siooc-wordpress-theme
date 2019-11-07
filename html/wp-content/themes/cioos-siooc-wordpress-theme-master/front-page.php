<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>



  <link rel="stylesheet" href="http://206.167.181.89:8008/asset/css/asset.css" type="text/css">
  <link rel="stylesheet" href="http://206.167.181.89:8008/asset/css/ol.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900|Quicksand:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
  <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
  <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <script src="http://206.167.181.89:8008/asset/js/asset_i18n.js"></script>
  <script src="http://206.167.181.89:8008/asset/js/asset_ckan.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/asset/js/asset.js"></script>

  <script>
    // debug scripts, not to be embedded

    function callChangeLanguage()
    {
      var newl = $( "#language option:selected" ).val();
      changeCurrentLanguage(newl);
    }

    function callChangeCKAN()
    {
      let newckan = $( "#ckan_instance option:selected" ).val();
      if ( newckan === "opencanada" )
      {
        changeCurrentCKAN("opendataca.json");
      }
      else if ( newckan === "slgo" )
      {
        changeCurrentCKAN("slgo_ckan.json");
      }
      else if ( newckan === "ioos" )
      {
        changeCurrentCKAN("ioos_ckan.json");
      }
      else if ( newckan === "Nextgeoss" )
      {
        changeCurrentCKAN("nextgeoss_ckan.json");
      }
      else if ( newckan === "pacific")
      {
        changeCurrentCKAN("cioos_pacific_ckan.json");
      }
    }

    function changeTimeFilters()
    {
      let minvalue = $( "#debug_date_min" ).val();
      let maxalue = $( "#debug_date_max" ).val();
      setTimeFilters(minvalue, maxalue);
    }

    function clearTimeFilters()
    {
      $( "#debug_date_min" ).val('');
      $( "#debug_date_max" ).val('');
      setTimeFilters(undefined, undefined);
    }

    function changeVerticalFilters()
    {
      let minvalue = $( "#debug_vertical_min" ).val();
      let maxalue = $( "#debug_vertical_max" ).val();
      setVerticalFilters(minvalue, maxalue);
    }

    function clearVerticalFilters()
    {
      $( "#debug_vertical_min" ).val('');
      $( "#debug_vertical_max" ).val('');
      setVerticalFilters(undefined, undefined);
    }


  </script>



  <div>
    <div class="map-container">
         <div id="map" class="map" style=""></div>
      
         <div id="category_panel" class="category-selection"></div>
        <div id="variable_panel" class="variable-selection tab-content"></div>
      <div id="dataset_desc" class="panel_details"></div>
      <div class="panel_search_info" style="text-align:center" id="dataset_search_stats"></div>
    </div>
  </div>
 
  <script src="http://206.167.181.89:8008/asset/js/asset_ol.js"></script>

			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>