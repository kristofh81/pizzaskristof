<?php

namespace StoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

use StoreBundle\Entity\Product;
use Doctrine\Common\Util\Debug;

/**
 * Cart controller.
 *
 * @Route("/cart", name="cart")
 */
class CartController extends Controller
{

public function indexAction( Request $request)
{

	$session = $request->getSession();
    if (!isset($session)){
        $arraysession[] = $session->set($id, $id);
    } else {
        $session->set($id, $id);    
    }



//$name = $session->get('name');
//$price = $session->get('price');
//$image = $session->get('image');


	//$id = $request->query->get('id');
//
//
//    //$em = $this->getDoctrine()->getEntityManager();
//    //$product = $em->getRepository('StoreBundle:Product')->find($id);
//
//    //$naam = $product->getName();
//   	//$prijs =  $product->getPrice();
    //$product = $product->getImage();

	//return $this->render('StoreBundle:Cart:index.html.twig', array('name'=> $name, 'price' => $price, 'image' => $image));

}

/**
 * @Route("/{id}", name="cart_add")
 */
public function addAction($id, Request $request)
{


    $em = $this->getDoctrine()->getEntityManager();
    $product = $em->getRepository('StoreBundle:Product')->find($id);
    //print_r($product->getId()); die;

    if (!$product) {
        throw $this->createNotFoundException('The product does not exist');
    } 
    else {
    $id = $product->getId();	
    $name = $product->getName();
   	$price = $product->getPrice();
    $image = $product->getImage();
	}

	$session = $request->getSession();

	if (!isset($arraysession)){
		$arraysession[] = $session->set($id, $id);
	} else {
		$session->set($id, $id);	
	}


	return $this->render('StoreBundle:Cart:productAdded.html.twig', array('name'=> $name, 'price' => $price, 'image' => $image));





/*

    // check if the $id already exists in it.
    if ( $product == NULL ) {
         $this->get('session')->setFlash('notice', 'This product is not     available in Stores');          
        return $this->redirect($this->generateUrl('cart'));
    } else {
        if( isset($cart[$id]) ) {

            $qtyAvailable = $product->getQuantity();

            if( $qtyAvailable >= $cart[$id] + 1 ) {
                $cart[$id] = $cart[$id] + 1; 
            } else {
                $this->get('session')->setFlash('notice', 'Quantity     exceeds the available stock');          
                return $this->redirect($this->generateUrl('cart'));
            }
        } else {
            // if it doesnt make it 1
            $cart = $session->get('cart', array());
            $cart[$id] = 1;
        }

        $session->set('cart', $cart);
        return $this->redirect($this->generateUrl('cart'));

    }

*/    
}







/**
 * @Route("/remove/{id}", name="cart_remove")
 */
public function removeAction($id, Request $request)
{
    // check the cart
 /*   $session = $this->getRequest()->getSession();
    $cart = $session->get('cart', array());

    // if it doesn't exist redirect to cart index page. end
    if(!$cart) { $this->redirect( $this->generateUrl('cart') ); }

    // check if the $id already exists in it.
    if( isset($cart[$id]) ) {
        // if it does ++ the quantity
        $cart[$id] = '0';
        unset($cart[$id]);
        //echo $cart[$id]; die();
    } else {
        $this->get('session')->setFlash('notice', 'test');    
        return $this->redirect( $this->generateUrl('cart') );
    }

    $session->set('cart', $cart);

    // redirect(index page)
    $this->get('session')->setFlash('notice', 'This product is Remove');
    return $this->redirect( $this->generateUrl('cart') );
   */ 
}




//endclass Controller
}