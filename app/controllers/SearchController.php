<?php
class SearchController extends BaseController
{
    private $qResults;
    public  $tRecords = 0;
    
    function getSearch() {
        if(Request::ajax()){
            $keyword = e(str_replace(',', ' ', Input::get('keyword')));
//            (int)e(Input::get('pageDisplay'))
            $limit = "LIMIT 10, 11";
            $query = "(SELECT page, rate as title, description FROM hdr_payment WHERE MATCH(rate, description) 
            AGAINST('{$keyword}' IN BOOLEAN MODE) {$limit}) UNION
            (SELECT d.page, c.country_name as title, d.charge as description FROM detail_payment d, country c WHERE d.payMethod=c.id AND
            MATCH(d.tuitCurr, d.charge) AGAINST('{$keyword}' IN BOOLEAN MODE) {$limit}) UNION
            (SELECT page, name as title, quote as description FROM teacher WHERE MATCH(name, quote)
            AGAINST('{$keyword}' IN BOOLEAN MODE) {$limit})";

            $this->qResults = DB::select($query);
            $result = array('qResults'=>$this->qResults, 'tRecords'=>$this->totalRecords($keyword));
            return Response::json($result);
        }
    }

    function totalRecords($keyword) {
        $query = "(SELECT COUNT(*) as total FROM hdr_payment WHERE MATCH(rate, description) AGAINST('{$keyword}' IN BOOLEAN MODE)) UNION
        (SELECT COUNT(*) as total FROM detail_payment d, country c WHERE d.payMethod=c.id AND MATCH(d.tuitCurr, d.charge)
        AGAINST('{$keyword}' IN BOOLEAN MODE)) UNION
        (SELECT COUNT(*) as total FROM teacher WHERE MATCH(name, quote) AGAINST('{$keyword}' IN BOOLEAN MODE))";
        $records = DB::select($query);
        foreach($records as $record){
            $this->tRecords += $record->total;
        }
        return $this->tRecords;
    }
}
?>
