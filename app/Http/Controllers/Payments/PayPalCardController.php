<?php

namespace App\Http\Controllers\Payments;

// Importaciones necesarias
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayPalCardController extends Controller
{
    private $client; // Cliente HTTP para realizar solicitudes a la API de PayPal
    private $clientId; // ID de cliente de PayPal
    private $secret; // Secreto de cliente de PayPal

    // Constructor para inicializar el cliente HTTP y obtener credenciales desde el archivo de configuración
    public function __construct()
    {
        // Inicializa el cliente HTTP con la URL base de la API de PayPal en modo sandbox
        $this->client = new Client([
            'base_uri' => 'https://api-m.sandbox.paypal.com'
        ]);

        // Obtiene el ID de cliente de PayPal desde el archivo de configuración
        $this->clientId = env('PAYPAL_SANDBOX_CLIENT_ID');
        // Obtiene el secreto de cliente de PayPal desde el archivo de configuración
        $this->secret = env('PAYPAL_SANDBOX_CLIENT_SECRET');
    }

    // Método para obtener el token de acceso desde la API de PayPal
    public function getAccessToken()
    {
        // Realiza una solicitud POST para obtener el token de acceso
        $response = $this->client->request('POST', '/v1/oauth2/token', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => 'grant_type=client_credentials',
            'auth' => [$this->clientId, $this->secret]
            ]
        );

        // Decodifica la respuesta JSON y obtiene el token de acceso
        $data = json_decode($response->getBody(), true);
        return $data['access_token'];
    }

    // Método para procesar un pedido de PayPal por su ID
    public function process($orderId)
    {
        try {
             // Obtiene el token de acceso
            $accessToken = $this->getAccessToken();

            // Realiza una solicitud GET para obtener los detalles del pedido usando el token de acceso
            $response = $this->client->request('GET', '/v2/checkout/orders/'.$orderId, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => "Bearer $accessToken"
                ],
            ]);

            // Retorna el cuerpo de la respuesta como una cadena
            return (string)($response->getBody());
        
        } catch (RequestException $e) {
            // Captura la excepción específica de Guzzle para manejar errores de solicitud
            \Log::error('Error al procesar pedido de PayPal: '.$e->getMessage());
            
            // Devuelve una respuesta genérica al cliente
            return response()->json(['error' => 'Ocurrió un error al procesar el pedido. Por favor, inténtelo de nuevo más tarde.'], 500);
        } catch (\Exception $e) {
            // Captura cualquier otra excepción que no sea de Guzzle
            \Log::error('Error desconocido al procesar pedido de PayPal: '.$e->getMessage());
            
            // Devuelve una respuesta genérica al cliente
            return response()->json(['error' => 'Ocurrió un error desconocido. Por favor, inténtelo de nuevo más tarde.'], 500);
        }
    }
}