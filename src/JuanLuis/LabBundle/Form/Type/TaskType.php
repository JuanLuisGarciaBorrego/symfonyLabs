<?php
/**
 * @author: JuanLuis
 * @date: 16/12/14 18:45
 */

namespace JuanLuis\LabBundle\Form\Type;

use JuanLuis\LabBundle\Form\EventListener\AddNameFieldOnlyForCreateNewTaskSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->addEventSubscriber(new AddNameFieldOnlyForCreateNewTaskSubscriber());

        $builder
            ->add('description')
            ->add('taskDate');

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
           'data_class' => 'JuanLuis\LabBundle\Entity\Task'
        ));
    }

    public function getName()
    {
        return 'Task';
    }

} 