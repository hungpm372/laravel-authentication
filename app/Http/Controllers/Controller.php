<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Laravel Authentication API",
 *     version="1.0.0",
 *     description="This API serves as a comprehensive solution for user authentication and registration within a Laravel application environment. It empowers users with essential functionalities including registration, login, logout, password reset, and account management. With robust security measures in place, it ensures a seamless and secure experience for users throughout their interactions with the application.",
 *     x={
 *         "logo": {
 *             "url": "https://via.placeholder.com/190x90.png?text=L5-Swagger"
 *         }
 *     },
 *     @OA\Contact(
 *         email="hungpm372@gmail.com",
 *         name="Phan Minh Hung",
 *         url="https://phanminhhung.id.vn"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     ),
 *     termsOfService="https://swagger.io/terms/",
 *     @OA\ExternalDocumentation(
 *         description="Find out more about Swagger",
 *         url="https://swagger.io"
 *     )
 * )
 * @OA\Servers(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Swagger API Server"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
