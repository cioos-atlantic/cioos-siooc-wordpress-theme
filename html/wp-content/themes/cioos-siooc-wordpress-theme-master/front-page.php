<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>


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
   <div>
    <h2>Debug Options</h2><br />
    language: 
    <select id="language" oninput="callChangeLanguage();">
      <option value="fr">Francais</option>
      <option value="en">English</option>
    </select><br />
    Ckan backend:
    <select id="ckan_instance" oninput="callChangeCKAN();">
      <option value="opencanada">open.canada.ca</option>
      <option value="slgo">SLGO</option>
      <option value="pacific">CIOOS Pacific</option>
      <option value="ioos">IOOS</option>
      <option value="Nextgeoss">Nextgeoss</option>
    </select><br />
    Minimum time interval: <input type="datetime-local" id="debug_date_min"><br />
    Maximum time interval: <input type="datetime-local" id="debug_date_max"><br />
    <button id="bnt_debug_setdate" onclick="changeTimeFilters();">Set Date filters</button>
    <button id="bnt_debug_cleardate" onclick="clearTimeFilters();">Clear Date filters</button><br />
    Vertical minimum: <input type="number" id="debug_vertical_min" min="-3000" max="10000"><br />
    Vertical maximum: <input type="number" id="debug_vertical_max" min="-3000" max="10000"><br />
    <button id="bnt_debug_setvertical" onclick="changeVerticalFilters();">Set Vertical filters</button>
    <button id="bnt_debug_clearvertical" onclick="clearVerticalFilters();">Clear Vertical filters</button><br />
  </div>


			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>