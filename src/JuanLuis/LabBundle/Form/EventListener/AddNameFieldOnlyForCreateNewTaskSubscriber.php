<?php
/**
 * @author: JuanLuis
 * @date: 17/12/14 12:34
 */

namespace JuanLuis\LabBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddNameFieldOnlyForCreateNewTaskSubscriber implements EventSubscriberInterface
{
    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    public static function getSubscribedEvents()
    {
       return array(FormEvents::PRE_SET_DATA => array('preSetData', 0));
    }

    public function preSetData(FormEvent $event)
    {
        $task = $event->getData();
        $form = $event->getForm();

        if(!$task || null === $task->getId()){
            $form->add('name', 'text',
                array(
                    'max_length' => 100
                )
            );
        }
    }

}