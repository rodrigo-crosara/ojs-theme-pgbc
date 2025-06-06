# Tema PGBC para OJS (pgbcJournalTheme)

![Licença](https://img.shields.io/badge/license-GPL--3.0--or--later-blue.svg)

## Descrição

Este projeto contém o tema customizado para a plataforma Open Journal Systems (OJS) da **Revista da Procuradoria-Geral do Banco Central (PGBC)**. O principal objetivo é aplicar os padrões de UI/UX e a identidade visual do site oficial do Banco Central do Brasil (`bcb.gov.br`) para criar uma experiência de leitura moderna, coesa e profissional para os usuários da revista.

Este tema é baseado na estrutura do tema padrão ("default") do OJS 3.3.x e adiciona personalizações significativas, além da integração com o framework Bootstrap 5.

---

## Principais Características

* **Identidade Visual do Banco Central do Brasil:** Cores, tipografia e elementos de layout inspirados no site `bcb.gov.br`.
* **Barra Gov.br:** Inclusão da barra de identidade padrão do Governo Federal para consistência institucional.
* **Bootstrap 5:** Integração do framework Bootstrap 5 via CDN para facilitar a criação de layouts responsivos e o uso de componentes modernos.
* **Fontes Customizadas:** Utilização das fontes **Ubuntu** (principal), **Raleway** (Barra Gov.br) e **Cormorant Garamond** (títulos de destaque), carregadas via Google Fonts.
* **Ícones:** Suporte para **Font Awesome** (herdado do tema padrão) e **Material Icons** (via CDN).
* **Base Estável:** Desenvolvido a partir de uma cópia do tema padrão do OJS para garantir compatibilidade e estabilidade.

---

## Pré-requisitos

* **Open Journal Systems (OJS) v3.3.x** ou superior.
    * *O desenvolvimento atual foi feito sobre a versão 3.3.0.6.*

---

## Instalação

Siga estes passos para instalar o tema na sua instância OJS:

1.  **Clone o Repositório:**
    Navegue até o diretório de temas do seu OJS (`plugins/themes/`) e clone este repositório.

    ```bash
    cd /caminho/para/seu/ojs/plugins/themes/
    git clone [https://github.com/SEU-USUARIO/ojs-theme-pgbc.git](https://github.com/SEU-USUARIO/ojs-theme-pgbc.git) pgbcJournalTheme
    ```
    > **Nota:** É importante que o nome da pasta seja `pgbcJournalTheme`, pois o código do plugin refere-se a este nome.

2.  **Ative o Tema no OJS:**
    * Acesse o painel de controlo do OJS como Administrador.
    * Navegue até **Configurações do Website > Plugins**.
    * Na aba **Plugins de Tema**, encontre o "PGBC Journal Theme (Cópia Default)" e clique na caixa de seleção para o habilitar.

3.  **Selecione o Tema para a Revista:**
    * Ainda no painel de controlo, navegue até **Configurações do Website > Aparência**.
    * Na aba **Tema**, selecione "PGBC Journal Theme (Cópia Default)" no menu dropdown e clique em **Salvar**.

4.  **Limpe o Cache:**
    * Para garantir que todas as alterações sejam aplicadas, vá para **Administração > Limpar Caches**.
    * Clique em **Limpar Cache de Templates** e **Limpar Cache de CSS**.

Agora, o frontend da sua revista deverá estar a usar o novo tema.

---

## Desenvolvimento e Personalização

Este tema foi construído a partir de uma cópia do tema "default" do OJS, o que significa que ele contém a estrutura de arquivos completa (PHP, LESS, JS).

* **Estilos:**
    * O arquivo principal para as suas personalizações é:
        `styles/pgbc-theme.css`
    * Os estilos base do OJS são carregados a partir dos arquivos `.less` na pasta `styles/`. Se precisar de fazer alterações profundas, pode editar esses arquivos (requer um compilador LESS ou que o OJS o faça automaticamente, dependendo da configuração). Para a maioria das personalizações visuais, sobrescrever os estilos no `pgbc-theme.css` é suficiente.

* **Templates (Estrutura HTML):**
    * Para modificar a estrutura HTML de uma página ou componente, copie o arquivo `.tpl` correspondente do diretório `lib/pkp/templates/` ou `templates/` (na raiz do OJS) para a mesma estrutura de pastas dentro de `plugins/themes/pgbcJournalTheme/templates/`.
    * Atualmente, já foram copiados e modificados:
        * `templates/frontend/components/header.tpl`
        * `templates/frontend/components/footer.tpl`

* **Arquivo Principal do Plugin:**
    * O arquivo `PgbcJournalThemePlugin.inc.php` controla o carregamento de todos os assets (CSS e JS). Pode editá-lo para adicionar ou remover folhas de estilo e scripts.

---

## Licença

Este projeto é distribuído sob a licença **GNU GPL v3.0**. Veja o arquivo `LICENSE` para mais detalhes.
