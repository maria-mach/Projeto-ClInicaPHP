        <!--begin::Footer-->
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Clínica Geral</div>
            <strong>
                Copyright &copy; <?= date("Y"); ?>&nbsp;
                <a href="<?= esc(url_path('paginas/index.php')) ?>" class="text-decoration-none text-dark">
                    Clínica Geral
                </a>.
            </strong>
            Todos os direitos reservados.
        </footer>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->

    <!-- Botão Voltar ao Topo -->
    <button id="btnTopo" class="btn btn-success rounded-circle shadow position-fixed bottom-0 end-0 m-4 h1">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!--begin::Script-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>

    <script src="<?= esc(url_path('js/adminlte.js')) ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';

        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };

        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

            if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>

    <script>
    const BASE_URL = "<?= esc(url_path('')) ?>";
    </script>

    <script>
    const URL_HORARIOS = "<?= esc(url_path('database/agendamentos/horarios_disponiveis.php')) ?>";
    </script>
    
    <script src="<?= esc(url_path('js/meujs.js')) ?>"></script>
            <!--end::Script-->
    </body>

</html>