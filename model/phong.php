<?php
    function insert_phong($tenphong,$gia,$giasale,$sokhach,$img,$mota,$idlp){
        $sql="INSERT INTO phong(name_phong,price,price_sale,sokhach,img,mota,id_loaiphong) values('$tenphong','$gia','$giasale','$sokhach','$img','$mota','$idlp')";
        pdo_execute($sql);
    }
    function delete_phong($id){
        $sql="delete from phong where id_phong=".$id;
        pdo_execute($sql);
    }
    function loadall_phong_home(){
        $sql="SELECT * FROM phong where 1 order by id_phong desc limit 0,9";
        $listp=pdo_query($sql);
        return $listp;
    }
    function loadall_phong($kyw="",$idlp=0){
        $sql="SELECT * FROM phong where 1";
        if($kyw!=""){
            $sql.=" and name_phong like '%".$kyw."%'";
        }
        if($idlp>0){
            $sql.=" and id_loaiphong like '".$idlp."'";
        }
        $sql.=" order by id_phong desc";
        $listp=pdo_query($sql);
        return $listp;
    }
    function loadone_phong($id){
        $sql="select * from phong where id_phong=".$id;
        $p=pdo_query_one($sql);
        return $p;
    }
    function load_phong_cungloai($id,$idlp){
        $sql="select * from phong where id_loaiphong=".$idlp." AND id_phong <> ".$id;
        $listp=pdo_query($sql);
        return $listp;
    }
    function load_tenlp($idlp){
        if($idlp>0){
            $sql="select * from loaiphong where id_loaiphong=".$idlp;
            $lp=pdo_query_one($sql);
            extract($lp);
            return $name_phong;
        }else{
            return "";
        }
        
    }
    function update_phong($id,$tenphong,$gia,$giasale,$sokhach,$img,$mota,$idlp){
        if($img!=""){
            $sql="UPDATE phong
            SET id_phong = '$id', name_phong = '$tenphong', price = $gia, price_sale = '$giasale', sokhach = '$sokhach', img = '$img', mota = '$mota' , id_loaiphong = $idlp
            WHERE id_phong = $id ";
        }else{
            $sql="UPDATE phong
            SET id_phong = '$id', name_phong = '$tenphong', price = $gia, price_sale = '$giasale', sokhach = '$sokhach', mota = '$mota' , id_loaiphong = $idlp
            WHERE id_phong = $id ";
        }
        pdo_execute($sql);
    }
?>