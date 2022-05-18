<?php
    
    namespace ICS\WebapiBundle;
    
    use Symfony\Component\DependencyInjection\ContainerBuilder;
    use Symfony\Component\HttpKernel\Bundle\Bundle;
    
    class WebapiBundle extends Bundle
    {
        public function build(ContainerBuilder $builder)
        {
        }
        
        public function getPath(): string
        {
            return \dirname(__DIR__);    
        }
    }