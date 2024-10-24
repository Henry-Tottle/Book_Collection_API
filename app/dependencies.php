<?php
declare(strict_types=1);
use App\Factories\LoggerFactory;
use App\Factories\PDOFactory;
use App\Factories\RendererFactory;
use DI\ContainerBuilder;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {

    //Dependency Injection Container (DIC)
    $container = [];
//When you need to create the class on the left, use the factory on the right
    $container[PDO::class] = DI\factory(PDOFactory::class);
    $container[LoggerInterface::class] = DI\factory(LoggerFactory::class);
    $container[PhpRenderer::class] = DI\factory(RendererFactory::class);
    $containerBuilder->addDefinitions($container);
};
