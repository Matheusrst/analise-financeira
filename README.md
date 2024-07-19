
# Aplicação de Análise Financeira em Laravel

Este projeto é uma aplicação de análise financeira desenvolvida com Laravel 10. A aplicação permite gerenciar transações financeiras, realizar análises financeiras, e gerar relatórios e projeções. Inclui funcionalidades para o cálculo de índices financeiros, balanços patrimoniais, fluxo de caixa e muito mais.

## Funcionalidades

- **Gerenciamento de Transações**: Adicionar, listar, editar e excluir transações financeiras.
- **Análises Financeiras**:
  - Balanço Patrimonial
  - Demonstração do Fluxo de Caixa
  - Análise Horizontal e Vertical
  - Índices Financeiros (ROI, ROE, Razão Corrente, Razão Rápida, Índice de Endividamento, Cobertura de Juros, Giro do Ativo)
  - Análise Comparativa
  - Projeções Financeiras
  - Cálculo de Fluxo de Caixa Livre
  - Cálculo de Preço de Venda
  - Análise de Demanda de Consumidores
  - Histórico de Transações
  - Prazo Médio de Recebimento e Pagamento
  - Payback Period
  - Valor Presente Líquido (VPL)
  - Taxa Interna de Retorno (TIR)

## Requisitos

- PHP >= 8.0
- Laravel >= 10.x
- MySQL ou outro banco de dados suportado
- Composer
- Node.js e npm para compilação de assets front-end (opcional)

## Instalação

1. **Clone o Repositório**

    ```bash
    git clone https://github.com/usuario/nome-do-repositorio.git
    ```

2. **Navegue para o Diretório do Projeto**

    ```bash
    cd nome-do-repositorio
    ```

3. **Instale as Dependências**

    ```bash
    composer install
    ```

4. **Configure o Ambiente**

    Copie o arquivo `.env.example` para um novo arquivo `.env` e configure as variáveis de ambiente conforme necessário.

    ```bash
    cp .env.example .env
    ```

5. **Gere a Chave da Aplicação**

    ```bash
    php artisan key:generate
    ```

6. **Execute as Migrations**

    ```bash
    php artisan migrate
    ```

7. **Compile os Assets (opcional)**

    Se você estiver usando Laravel Mix para assets front-end, execute:

    ```bash
    npm install
    npm run dev
    ```

8. **Inicie o Servidor de Desenvolvimento**

    ```bash
    php artisan serve
    ```

    A aplicação estará disponível em `http://localhost:8000`.

## Testes

Para executar os testes, use o comando:

```bash
php artisan test
```

## Contribuição

Se desejar contribuir para este projeto, por favor siga os seguintes passos:

1. Faça um fork deste repositório.
2. Crie uma nova branch (`git checkout -b feature/MinhaNovaFuncionalidade`).
3. Faça suas alterações e commits (`git commit -am 'Adiciona nova funcionalidade'`).
4. Faça um push para a branch (`git push origin feature/MinhaNovaFuncionalidade`).
5. Abra um Pull Request.

## Licença

Este é um projeto open source de codigo e licença aberta sem nehuma finalidade de uso proficional ou industrial.

## Contato

Para mais informações, entre em contato:

- **Nome**: Matheus Ribeiro De Sales Tiné
- **E-mail**: matheusriberomatheus@gmail.com
- **GitHub**: [Matheusrst](https://github.com/Matheusrst)
