<?php

namespace classes;
use XMLWriter;

class XMLFormatter implements FileFormatter
{
    public function generateFile(array $data, string $path): void
    {
        $writer = new XMLWriter();
        $writer->openUri($path);
        $writer->startDocument('1.0', 'UTF-8');

        $writer->startElement('urlset');

        $writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $writer->writeAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

        foreach ($data as $items) {
            $writer->startElement('url');

            $writer->writeElement('loc', htmlspecialchars($items['loc']));
            $writer->writeElement('lastmod', $items['lastmod']);
            $writer->writeElement('priority', $items['priority']);
            $writer->writeElement('changefreq', $items['changefreq']);

            $writer->endElement();
        }

        $writer->endElement();
        $writer->endDocument();
        $writer->flush();
    }
}

