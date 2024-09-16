<?php
/**
 * Show a subset of records.
 *
 * @author Leonardo Pinheiro
 */
class Pagination {
    
    /**
     *
     * @var int A página atual.
     */
    public $current_page;
    
    /**
     *
     * @var int Número de páginas que será mostrado por página.
     */
    public $per_page;
    
    /**
     *
     * @var int Número total de registros.
     */
    public $total_count;
    
    /**
     * Construtor da classe.
     * 
     * @param int $page A página atual.
     * @param int $per_page Número de páginas que será mostrado por página.
     * @param int $total_count Número total de registros.
     */
    public function __construct( $page=1, $per_page=20, $total_count=0 ) {
        $this->current_page = (int) $page; // Type cast, pois está vindo da URL string.
        $this->per_page = (int) $per_page;
        $this->total_count = (int) $total_count;
    }
    
    /**
     * 
     * @return int Quantidade do offset.
     */
    public function offset() {
        return $this->per_page * ($this->current_page - 1);
    }
    
    /**
     * 
     * @return int Quantidade total de páginas.
     */
    public function total_pages() {
        // Arredonda para cima o resultado.
        return ceil($this->total_count / $this->per_page);
    }
    
    /**
     * 
     * @return int|bool A página anterior.
     */
    public function previous_page() {
        $prev = $this->current_page - 1;
        return ( $prev > 0 ) ? $prev : FALSE;
    }
    
    /**
     * 
     * @return int|bool A próxima página.
     */
    public function next_page() {
        $next = $this->current_page + 1;
        return ( $next <= $this->total_pages() ) ? $next : FALSE;
    }
    
    /**
     * 
     * @param string $url A URL base.
     * @return string $link A URL resultante.
     */
    public function previous_link( $url="" ) {
        $link = "";
        if( $this->previous_page() != FALSE ) {
            $link .= "<a href=\"{$url}?page={$this->previous_page()}\">";
            $link .= "&laquo; Previous</a>";
        }
        return $link;
    }
    
    /**
     * 
     * @param string $url A URL base.
     * @return string $link A URL resultante.
     */
    public function next_link( $url="" ) {
        $link = "";
        if( $this->next_page() != FALSE ) {
             $link .= "<a href=\"{$url}?page={$this->next_page()}\">";
             $link .= "Next &raquo;</a>";
         } 
         return $link;
    }
    
    /**
     * Cria a numeração da paginação.
     * 
     * @param string $url A URL base.
     * @return string $output Os números da paginação em uma String.
     */
    public function number_links( $url="" ) {
        $output = "";
        for($i = 1; $i <= $this->total_pages(); $i++) {
            if( $i == $this->current_page ) {
                
                // Adiciona a classe "selected" à página atual.
                $output .= "<span class=\"selected\">{$i}</span>";
            } else {
                $output .= "<a href=\"{$url}?page={$i}\">{$i}</a>";
            }
        }
        return $output;
    }
    
    /**
     * Cria a paginação efetivamente com todas as partes menores.
     * 
     * @param string $url A URL base.
     * @return string O HTML da paginação completa.
     */
    public function page_links( $url ) {
        $output = "";
        if( $this->total_pages() > 1 ) {
            $output .= "<div class=\"pagination\">";
            $output .= $this->previous_link($url);
            $output .= $this->number_links($url);
            $output .= $this->next_link($url);
            $output .= "</div>";
        }
        return $output;
    }
    
}

?>