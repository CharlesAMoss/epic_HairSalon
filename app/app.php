<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";


    $app = new Silex\Application();
    $app['debug'] = true;
    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylists/{id}", function($id) use ($app) {
        $found_stylist = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $found_stylist, 'client' => $found_stylist->getClient()));
    });

    $app->get("/stylists/{id}/edit", function($id) use ($app) {
        $stylist = Stylists::find($id);
        return $app['twig']->render('stylist_edit.html.twig', array('stylist' => $stylist));
    });

    $app->patch("/stylists/{id}", function($id) use ($app) {
        $name = $_POST['name'];
        $stylist = Stylist::find($id);
        $stylist->update($name);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'Clients' => $stylist->getClients()));
    });

    $app->post("/clients", function() use ($app) {
        $name = $_POST['name'];
        $stylist_id = $_POST['stylist_id'];
        $appointment = $_POST['appointment'];
        $client = new Client($name, $id = null, $stylist_id, $appointment);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'client' => $stylist->getClient()));
    });

    $app->post("/stylists", function() use ($app) {
        $stylist = new Stylist($_POST['name']);
        $stylist->save();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/delete_stylists", function() use ($app) {
        //Clients::deleteAll();
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/delete_client", function() use ($app) {
        $category_id = $_POST['stylist_id'];
        Client::delete($stylist_id);
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/all_clients", function() use ($app) {
        return $app['twig']->render('all_clients.html.twig', array('clients' => Client::getAll(), 'stylists' => Stylist::getAll()));
    });

    $app->post("/client", function() use ($app) {
        $name = $_POST['name'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($name, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => Client::getAll()));
    });

    return $app;
 ?>
