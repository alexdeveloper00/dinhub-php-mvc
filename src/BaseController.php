<?php 
namespace dinhub;

class BaseController {
    private string $path = 'app/view/';
    private string | null $layout = null;

    public function render(string $view, array | null $data) : void {
        $incPath = __DIR__ . '/../' . $this->path . $view . '.php';
        $layoutPath = __DIR__ . '/../app/layout/' . $this->layout . '.php';

        if ($this->layout && !file_exists($layoutPath)) {
            echo "Cannot open layout file";
            exit;
        }

        if (!file_exists($incPath)) {
            echo "Cannot open file";
            exit;
        }

        if (null !== $data) {
            extract($data);
        }

        ob_start();
        ob_implicit_flush(false);
        require $incPath;
        $content = ob_get_clean();
        

        if ($this->layout) {
            require $layoutPath;
        } else {
            echo $content;
        }
    }

    public function redirect(string $url) {
        header('Location: ' . $url, true);
        die();
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