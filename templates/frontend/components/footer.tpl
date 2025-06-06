{**
 * templates/frontend/components/footer.tpl
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @brief Common site frontend footer, adapted for PGBC Journal Theme.
 *
 * @uses $isFullWidth bool
 * @uses $pageFooter string
 * @uses $brandImage string
 * @uses $baseUrl string
 *}

	</div>{* Sidebars *}
	{if empty($isFullWidth)}
		{capture assign="sidebarCode"}{call_hook name="Templates::Common::Sidebar"}{/capture}
		{if $sidebarCode}
			<div class="pkp_structure_sidebar left" role="complementary" aria-label="{translate|escape key="common.navigation.sidebar"}">
				{$sidebarCode}
			</div>{/if}
	{/if}
</div>{*
  -- Início da Modificação do Rodapé para o Tema PGBC --
  A estrutura abaixo foi baseada no rodapé do site bcb.gov.br
*}
<div class="pkp_structure_footer_wrapper" role="contentinfo">
	<a name="inicioRodape" id="inicioRodape"></a>
	<div class="container">
		<span class="line"></span>
		<div class="d-lg-flex align-items-lg-center justify-content-lg-between pr-5 py-3">
			<div class="missao mb-2 mb-lg-0 mr-lg-3"><div class="selo-qualis"></div>
				Promovendo a excelência jurídica e a inovação no sistema financeiro, para um Brasil mais justo e próspero.
			</div>
			<div class="info">
				{* Primeira linha de links do BCB, adaptada para o OJS *}
				<ul class="list-inline text-lg-right">
					<li class="list-inline-item">Atendimento: 145 (custo de ligação local)</li>
					<li class="list-inline-item"><a href="{url page="about" op="contact"}">{translate key="about.contact"}</a></li>
				</ul>
				{* Segunda linha de links, com integração do conteúdo OJS *}
				<ul class="list-inline text-lg-right mb-0">
					{if $pageFooter}
						<li class="list-inline-item">{$pageFooter}</li>
					{/if}
					<li class="list-inline-item">© {$currentYear} Revista do PGBC - Todos os direitos reservados</li>
					{* Link de atribuição do OJS, estilizado como texto simples para se encaixar no design *}
					<li class="list-inline-item pgbc_ojs_brand">
						<a href="{url page="about" op="aboutThisPublishingSystem"}">
							Sobre OJS
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div></div>{load_script context="frontend"}

{call_hook name="Templates::Common::Footer::PageFooter"}
</body>
</html>