<?php 
namespace dinhub;

class BaseController {
    private string $path = 'app/view/';
    private string | null $layout = null;

    public function render(string $view, array | null $data) : void {
        if (null !== $data) {
            extract($data);
        }

        ob_start();
        include __DIR__ . '/../' . $this->path . $view . '.php';
        $content = ob_get_clean();

        if ($this->layout) {
            include __DIR__ . '/../app/layout/' . $this->layout . '.php';
        } else {
            echo $content;
        }
    }

    public function layout(string | null $layoutName) : void {
        $this->layout = $layoutName;
    }

    public function html(string $html) {
        echo htmlspecialchars($html);
    }

    public function json(array $json) : void {
        echo json_encode($json);
    }
}