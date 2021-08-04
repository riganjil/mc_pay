<?php
function get_user()
{
    $data = session('user');
    return $data;
}

function get_balance()
{
    $client = new \GuzzleHttp\Client();
    $id = get_user()->id;
    $response = $client->get(env("API_SERVICE")."/api/v1/user/$id");
    $data = json_decode($response->getBody())->data;
    return $data->balance;
}
