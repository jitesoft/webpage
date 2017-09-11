<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  PageSeeder.php - Part of the web project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\Seeders;

use App\Models\AbstractModel;
use App\Models\Page;
use Symfony\Component\Yaml\Yaml;

class PageSeeder extends AbstractSeeder {

    protected $ignore = [ ".", "..", "Thumbs.db", ".gitignore", ".DS_Store" ];

    protected function seed() : array {
        $path       = resource_path("texts");
        $dirContent = scandir($path);
        $pages      = [];

        foreach ($dirContent as $file) {
            $fullPath = sprintf("%s/%s", $path, $file);

            if (is_dir($fullPath) || in_array($file, $this->ignore)) {
                continue;
            }

            $content = file_get_contents($fullPath);
            $pos     = strpos($content, "----");
            $header  = Yaml::parse(substr($content, 0, $pos));
            $body    = substr($content, $pos + 5);
            $page    = new Page(
                $header['id'],
                $header['title'],
                nl2br($body),
                $header['active'],
                md5($content)
            );
            $pages[] = $page;
        }
        return $pages;
    }

    /**
     * @param AbstractModel $model
     * @param array         $models
     * @return bool
     */
    protected function exists(AbstractModel $model, Array $models) : bool {
        /** @var Page $model */
        return array_first($models, function(Page $page) use($model) {
            return $page->getHash() === $model->getHash();
        }) !== null ? true : false;
    }

}
