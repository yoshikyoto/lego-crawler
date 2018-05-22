<?php

namespace LegolandScraper\File;

class File {

    public function write($filename, $data) {
        file_put_contents($filename, $data)
    }

}
