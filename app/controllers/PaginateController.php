<?php
class PaginateController{
    $currpage = 0;
    $recordPerPage = 0;
    $totalRecords = 0;

    function __construct($currpage, $rpp=10, $totalRecords) {
        $this->currpage = $currpage;
        $this->recordPerPage = $rpp;
        $this->totalRecords = $totalRecords;
    }

    function offset() {
        return ($this->currpage - 1) * $this->recordPerPage;
    }

    function totalPages() {
        return ceil($this->totalRecords/$this->recordPerPage);
    }

    function nextPage() {
        return $this->currpage + 1;
    }

    function prevPage() {
        return $this->currpage - 1;
    }

    function hasNextPage() {
        return $this->currpage <= $this->totalPages() ? true : false;
    }

    function hasPrevPage() {
        return $this->currpage >= 1 ? true : false;
    }
}
?>
