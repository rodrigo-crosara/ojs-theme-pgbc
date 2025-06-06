<?php
/**
 * @file plugins/themes/pgbcJournalTheme/PgbcJournalThemePlugin.inc.php
 * (Este arquivo é uma cópia modificada do DefaultThemePlugin.inc.php)
 *
 * Copyright (c) 2024 PGBC/BCB
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class PgbcJournalThemePlugin
 * @ingroup plugins_themes_pgbcJournalTheme
 *
 * @brief PGBC Journal theme (based on Default Theme structure)
 */
import('lib.pkp.classes.plugins.ThemePlugin');

class PgbcJournalThemePlugin extends ThemePlugin {
    /**
     * @copydoc ThemePlugin::isActive()
     */
    public function isActive() {
        if (defined('SESSION_DISABLE_INIT')) return true;
        return parent::isActive();
    }

    /**
     * Initialize the theme's styles, scripts and hooks.
     * @return null
     */
    public function init() {
        AppLocale::requireComponents(LOCALE_COMPONENT_PKP_MANAGER, LOCALE_COMPONENT_APP_MANAGER);

        // Carregar a folha de estilo principal do tema base (ex: styles/index.less)
        $this->addStyle('stylesheet', 'styles/index.less');

        $request = Application::get()->getRequest();

        // Carregar Font Awesome (essencial para ícones do tema base)
        $this->addStyle(
            'fontAwesome',
            $request->getBaseUrl() . '/lib/pkp/styles/fontawesome/fontawesome.css',
            ['baseUrl' => '']
        );
        
        $context = $request->getContext();
        // Manter lógica de imagem do cabeçalho do tema default, se aplicável e desejado.
        // if ($context && $this->getOption('useHomepageImageAsHeader')) { ... }


        // Carregar jQuery e jQueryUI (essenciais para JS do tema base)
        $min = Config::getVar('general', 'enable_minified') ? '.min' : '';
        $jquery = $request->getBaseUrl() . '/lib/pkp/lib/vendor/components/jquery/jquery' . $min . '.js';
        $jqueryUI = $request->getBaseUrl() . '/lib/pkp/lib/vendor/components/jqueryui/jquery-ui' . $min . '.js';
        $this->addScript('jQuery', $jquery, ['baseUrl' => '']);
        $this->addScript('jQueryUI', $jqueryUI, ['baseUrl' => '']);

        // JS do Bootstrap 4 e main.js do tema default (se existirem na cópia)
        if (file_exists($this->getPluginPath() . '/js/lib/popper/popper.js')) { 
             $this->addScript('popper', 'js/lib/popper/popper.js'); // Para BS4
             $this->addScript('bsUtil', 'js/lib/bootstrap/util.js'); // Para BS4
             $this->addScript('bsDropdown', 'js/lib/bootstrap/dropdown.js'); // Para BS4
        }
        if (file_exists($this->getPluginPath() . '/js/main.js')) {
            $this->addScript('pgbc-main-js', 'js/main.js'); // JS do tema default
        }

        // --- NOSSAS ADIÇÕES PARA BOOTSTRAP 5 E ESTILOS PGBC ---

        // 1. Carregar Bootstrap 5 CSS (from CDN)
        $this->addStyle(
            'bootstrap5-cdn',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
            ['baseUrl' => '', 'priority' => STYLE_SEQUENCE_DEFAULT + 20] 
        );
        
        // 2. Carregar Material Icons (from Google Fonts CDN)
        $this->addStyle(
            'material-icons-cdn', 
            'https://fonts.googleapis.com/icon?family=Material+Icons',
            ['baseUrl' => '', 'priority' => STYLE_SEQUENCE_DEFAULT + 1] 
        );

        // 3. Carregar Ubuntu Font (from Google Fonts CDN)
        $this->addStyle(
            'ubuntu-font-cdn', 
            'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap', // Removido 700, será definido no CSS
            ['baseUrl' => '', 'priority' => STYLE_SEQUENCE_DEFAULT + 2] 
        );
        
        // 4. Carregar Raleway Font (for Gov.br bar, from Google Fonts CDN)
        $this->addStyle(
            'raleway-font-cdn', 
            'https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap', // Apenas Bold (700)
            ['baseUrl' => '', 'priority' => STYLE_SEQUENCE_DEFAULT + 3] 
        );
        
        // 5. Carregar Cormorant Garamond (para uso opcional, conforme CSS do BCB)
        $this->addStyle(
            'cormorant-garamond-font-cdn',
            'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap',
            ['baseUrl' => '', 'priority' => STYLE_SEQUENCE_DEFAULT + 4]
        );

        // 6. Carregar nosso CSS personalizado (pgbc-theme.css) DEPOIS de todos os outros
        $this->addStyle(
            'pgbc-custom-styles',
            'styles/pgbc-theme.css',
            ['priority' => STYLE_SEQUENCE_LATE] 
        );
        
        // Carregar Bootstrap 5 JS (from CDN) - O bundle já inclui Popper
        $this->addScript(
            'bootstrap5-js-cdn',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
            ['baseUrl' => '', 'priority' => STYLE_SEQUENCE_LATE]
        );

        // Adicionar áreas de menu (CRUCIAL PARA OS MENUS APARECEREM)
        $this->addMenuArea(['primary', 'user']);
    }

    function getDisplayName() {
        return 'PGBC Journal Theme (Cópia Default)';
    }

    function getDescription() {
        return 'Tema para a Revista da PGBC, baseado na cópia do tema padrão do OJS, com personalizações visuais do BCB (V1.15).';
    }
}
?>