<?

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Product;

class ProductControllerTest extends WebTestCase
{

    public function testIndexProduct()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertStringContainsString(
            'Caja',
            $client->getResponse()->getContent()
        );
    }
    public function testNewProduct()
    {
        $product = new Product();
        $product->setName("Caja");
        $product->setDescription("Caja de Madera");
        $product->setPrice(15);
        $array = (array) $product;
        $client = static::createClient();

        $client->request('POST', '/new', $array);
        $this->assertResponseIsSuccessful();
    }

    public function testShowProduct()
    {
        $client = static::createClient();
        $client->request('GET', '/1');
        $this->assertStringContainsString(
            'Caja',
            $client->getResponse()->getContent()
        );
    }

    public function testEditProduct()
    {
        $product = new Product();
        $product->setName("Cajas");
        $product->setDescription("Cajas de Madera");
        $product->setPrice(30);
        $array = (array) $product;
        $client = static::createClient();
        $client->request('POST', '/1/edit', $array);
        $client->request('GET', '/');
        $this->assertStringContainsString(
            'Cajas',
            $client->getResponse()->getContent()
        );
    }
}
