<?php

use App\Faculty;
use App\User;
use App\Enseignant;
use Hashids\Hashids;

if(!function_exists('getCurrentYear'))
{
    function getCurrentYear() {
        return date('Y',strtotime(now()));
    }    
}

if(!function_exists('encodeKey'))
{
    function encodeKey($idTohashed) {
        $keyGen = new Hashids('',6);
        return $keyGen->encode($idTohashed);
    }
}

if(!(function_exists('decodeKey')))
{
    function decodeKey($idToUnhashed) {
        $keyGen = new Hashids('',6);
        return $keyGen->decode($idToUnhashed);
    }
}

if(!(function_exists('getPublisher')))
{
    function getPublisher($role, $publisher) {
        $keyGen = new Hashids('',6);
        $id =  $keyGen->decode($publisher)[0];
        if($role == "pro")
        {
            $teacher = Enseignant::findOrFail($id);
            $publisherName = $teacher->name;
        }
        else 
        {
            $faculty = Faculty::findOrFail($id);
            $publisherName = $faculty->title;
        }
        return $publisherName;
    }
}
if(!function_exists('getPublisherEmail'))
{
    function getPublisherEmail($role, $publisher) {
        $keyGen = new Hashids('',6);
        $id =  $keyGen->decode($publisher)[0];
        if($role == "pro")
        {
            $teacher = Enseignant::findOrFail($id);
            $publisherEmail = $teacher->email;
        }
        else 
        {
            $faculty = Faculty::findOrFail($id);
            $publisherEmail = $faculty->email;
        }
        return $publisherEmail;
    }
}
if(!function_exists('getAuthor')) {
    function getAuthor($publisher) {
        $keyGen = new Hashids('',6);
        $id =  $keyGen->decode($publisher)[0];
        $user = User::findorFail($id);
        $publisherName = $user->name;
        return $publisherName;
    }
}
?>