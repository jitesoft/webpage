<?php

namespace App\Console\Commands;

use App\Contracts\PageRepositoryInterface;
use App\Models\Page;
use Illuminate\Console\Command;
use Symfony\Component\Yaml\Yaml;

class RebuildTexts extends Command {

    protected $ignore = [ ".", "..", "Thumbs.db", ".gitignore", ".DS_Store" ];

    /** @var PageRepositoryInterface */
    protected $pageRepository;

    /** @var string */
    protected $signature = 'pages:rebuild';

    /** @var string */
    protected $description = 'Fetches the page texts from resources/texts directory and " .
                             "re-adds them to the database if needed.';

    /**
     * RebuildTexts constructor.
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(PageRepositoryInterface $pageRepository) {
        parent::__construct();

        $this->pageRepository = $pageRepository;
    }

    private function addNew(array $header, string $body, string $fileContent) {
        $page = new Page($header['id'], $header['title'], $body, $header['active'], md5($fileContent));
        $this->pageRepository->persist($page);
    }

    public function handle() {
        $path       = resource_path("texts");
        $dirContent = scandir($path);

        foreach ($dirContent as $file) {
            $fullPath = sprintf("%s/%s", $path, $file);

            if (is_dir($fullPath) || in_array($file, $this->ignore)) {
                continue;
            }

            $content = file_get_contents($fullPath);
            $pos     = strpos($content, "----");
            $header  = Yaml::parse(substr($content, 0, $pos));
            $body    = substr($content, $pos + 5);



            $page = $this->pageRepository->findByIdentifier($header['id']);
            if ($page === null) {
                $this->addNew($header, $body, $content);
                continue;
            }

            $page->setBody(nl2br($body));
            $page->setTitle($header['title']);
            $page->setActive($header['active']);
            $page->setHash(md5($content));

            $this->pageRepository->persist($page);
        }
    }
}
