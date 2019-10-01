# Prontuário Eletrônico

[![GitHub Issues Abertas](https://img.shields.io/github/issues/cpa-bayarea/Prontuario-2.0.svg?maxAge=2592000)]() 
[![GitHub Issues Fechas](https://img.shields.io/github/issues-closed-raw/cpa-bayarea/Prontuario-2.0.svg?maxAge=2592000)]()
<a href="https://app.zenhub.com/workspace/o/cpa-bayarea/Prontuario-2.0/boards" target="_blank">
    <img src="https://img.shields.io/badge/Managed_with-ZenHub-5e60ba.svg" alt="zenhub">
</a>

O Prontuário Eletrônico é uma aplicação feita pelos alunos do [Centro de Práticas Acadêmicas](https://github.com/cpa-bayarea/) do IESB OESTE, o sistema é para o Centro de Pesquisas.

Estas são documentações sobre o processo de desenvolvimento do Prontuário, versionameno e publicação:

* [Roteiro de publicação de releases](docs/Roteiro_de_publicacao_de_releases.md)
* [Regras de versionamento](docs/Regras_versionamento.md)
* [Guia de operação e desenvolvimento](docs/Guia_de_operacao-desenvolvimento.md)
* [Guia de fluxo de demandas do Kanban](docs/Fluxo_Kanban.md)

## Docker
Utilizamos o Docker como plataforma de desenvolvimento com o intuito de garantir o mesmo ambiente de desenvolvimento 
independentemente do Sistema Operacional(SO) utilizado.

Para criar um ambiente para trabalhar com o Prontuário basta executar o comando abaixo:
```
  docker-compose up
```

Para criar um ambiente de desenvolvimento:
```
  docker-compose -f docker-compose.dev.yml up
```

> Neste caso o servidor estará disponível na porta `8000`

Para visualizar os containers
```
  docker-compose ps
```

Para executar as migrations com as seeders
```
  docker exec -it prontuario-app php artisan migrate:fresh --seed
```

Em caso de erros na aplicação:
```
  docker exect -it prontuario-app composer dump-autoload
```

Após finalizado os procedimentos de configuração do ambiente acesse o sistema pela porta 81 por exemplo:
```
http://localhost:81
```
Na tela de login utilize o CPF de demonstração e senha abaixo:
```
login: admin@gmail.com
Senha: admin
```

## Tecnologias
* [PHP](http://php.net/)
* [Laravel 5.8](https://laravel.com/docs/5.8) 
* [Docker](https://www.docker.com)
* [JQuery](https://jquery.com/)
* [Bootstrap](https://getbootstrap.com/)
* [MYSQL](https://www.mysql.com)

## Autores
Várias pessoas colaboraram com o desenvimento do projeto Prontuário e decidimos centralizar em um único local todos os que participaram com o desenvolvimento do projeto.
  
Clique [aqui](docs/Autores.md) para visualizar.

