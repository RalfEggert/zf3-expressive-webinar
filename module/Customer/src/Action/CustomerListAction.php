<?php
/**
 * zf3-expressive-webinar
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 Admin
 * @license    All rights reserved
 */

namespace Customer\Action;

use Customer\Table\CustomerTable;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class CustomerListAction implements MiddlewareInterface
{
    /** @var TemplateRendererInterface */
    private $templateRenderer;

    /** @var CustomerTable */
    private $customerTable;

    /**
     * CustomerListAction constructor.
     *
     * @param TemplateRendererInterface $templateRenderer
     * @param CustomerTable             $customerTable
     */
    public function __construct(TemplateRendererInterface $templateRenderer, CustomerTable $customerTable)
    {
        $this->templateRenderer = $templateRenderer;
        $this->customerTable    = $customerTable;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $data = [
            'customerList' => $this->customerTable->fetchList(),
        ];

        $html = $this->templateRenderer->render('customer::list', $data);

        return new HtmlResponse($html);
    }
}