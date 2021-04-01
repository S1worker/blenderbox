<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Helpers extends Controller
{

    /**
     * Helpers constructor.
     */
    public function __construct(){

        add_action('wp_ajax_nopriv_courses', array(&$this, 'catalogCourse'));
        add_action('wp_ajax_courses', array(&$this, 'catalogCourse'));

    }
    /**
     * Breadcrumbs
     */
    public function breadcrumbs($args = []) {

        /**
         * Default args
         */
        $defaults = [
            'separator'     => ' » ',
            'class'         => 'breadcrumbs'
        ];
        $args = wp_parse_args( $args, $defaults );

        /**
         * Get Current Page number
         */
        $page_num = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        /**
         * List Html
         */
        $list = '<ul class="' . $args['class'] . '">';


        if( is_front_page() ){

            /**
             * is Home Page
             */
            if( $page_num > 1 ) :
                //$list .= '<li>' . '<a href="' . site_url() . '">' . __( 'Home' ) . '</a></li>';
            endif;

        } else {

            /**
             * is not Home Page
             */
            //$list .= '<li>' . '<a href="' . site_url() . '">' . __( 'Home' ) . '</a></li>';

            /**
             * Singl Page
             */
            if( is_single() ){

                the_category( ', ' );
                echo $args['separator']; the_title();

            } elseif ( is_page() ){

                /**
                 * Global post
                 */
                global $post;

                /**
                 * is parent post
                 */
                if ( $post->post_parent ) :

                    $parent_id  = $post->post_parent;

                    while ( $parent_id ) :

                        $page = get_page( $parent_id );
                        $list .= '<li>' . '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>';
                        $parent_id = $page->post_parent;

                    endwhile;

                endif;

                /**
                 * Get Children
                 */
                $args_child = [
                    'post_parent'   => $post->post_parent, // Current post's ID
                    'numberposts'   => -1,
                    'post_type'     => 'page',
                ];
                $children = get_children( $args_child );


                if( $children && count($children) > 1) :

                    $list .= '<li>';
                    $list .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
                    $list .= '<ul>';

                    foreach ($children as $child) :

                        if( $child->ID <> get_the_ID() ) :
                            $list .= '<li><a href="' . get_permalink( $child->ID ) . '">' . $child->post_title . '</a></li>';
                        endif;

                    endforeach;

                    $list .= '</ul>';
                    $list .= '</li>';

                else:

                    $list .= '<li><span>' . get_the_title() . '</span></li>';

                endif;


            } elseif ( is_category() ) {

                $list .= '<li>' . '<a href="' . get_category_link() . '">' . single_cat_title() . '</a></li>';


            } elseif( is_tag() ) {

                //single_tag_title();

            } elseif ( is_day() ) {

//                echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $args['separator'];
//                echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a>' . $args['separator'];
//                echo get_the_time('d');

            } elseif ( is_month() ) {

//                echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $args['separator'];
//                echo get_the_time('F');

            } elseif ( is_year() ) {

//                echo get_the_time( 'Y' );

            } elseif ( is_author() ) {

//                global $author;
//                $userdata = get_userdata( $author );
//                echo 'Published User ' . $userdata->display_name;

            } elseif ( is_404() ) {

//                echo 'Error 404';

            }

            if ( $page_num > 1 ) :
//                echo ' (' . $page_num . ' page)';
            endif;

        }

        $list .= '</ul>';

        echo $list;

    }

    /**
     * Catalog Programs Parse JSON
     */
    public function catalogPrograms($catalog = 0, $program = 0){

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL             => 'https://nec.acalogadmin.com/widget-api/catalog/' . $catalog . '/program/' . $program . '/',
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => "",
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 0,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => "GET",
        ] );

        $response = curl_exec($curl);
        curl_close($curl);

        if( $response ) :

            return json_decode($response);

        endif;

    }

    /**
     * Catalog Course Parse JSON
     */
    public function catalogCourse($catalog = 0, $id = 0){

        if( wp_doing_ajax() ) :
            $catalog    = absint($_POST['program_id']);
            $id         = absint($_POST['course_id']);
        endif;

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL             => 'https://nec.acalogadmin.com/widget-api/catalog/' . $catalog . '/course/' . $id . '/',
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => "",
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 0,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => "GET",
        ] );

        $response = curl_exec($curl);
        curl_close($curl);

        /**
         * Ajax
         */
        if( wp_doing_ajax() ) :

            wp_send_json_success([ 'html' => json_decode($response)->body ]);
            wp_die();

        endif;

        if( $response ) :

            return json_decode($response);

        endif;

    }

}
