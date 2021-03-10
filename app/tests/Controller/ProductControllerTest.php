<?

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Product;

class ProductControllerTest extends WebTestCase
{
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
}