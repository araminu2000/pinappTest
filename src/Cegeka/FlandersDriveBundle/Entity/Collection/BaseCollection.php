<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;


use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Closure, ArrayIterator;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\ClosureExpressionVisitor;
use Doctrine\Common\Collections\Selectable;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * An ArrayCollection is a Collection implementation that wraps a regular PHP array.
 *
 * @since  2.0
 * @author Guilherme Blanco <guilhermeblanco@hotmail.com>
 * @author Jonathan Wage <jonwage@gmail.com>
 * @author Roman Borschel <roman@code-factory.org>
 * @JMS\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema-instance", prefix="xsi")
 */
class BaseCollection extends EntityBase implements Collection, Selectable
{
    /**
     * An array containing the entries of this collection.
     * @var array
     */
    protected $_elements;

    /**
     * @param array $elements
     * @return $this
     */
    public function setElements($elements)
    {
        $this->_elements = $elements;
        return $this->_elements;
    }

    /**
     * @return array
     */
    public function getElements()
    {
        return $this->_elements;
    }

    /**
     * Initializes a new ArrayCollection.
     *
     * @param array $elements
     */
    public function __construct(array $elements = array())
    {
        $this->_elements = $elements;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return $this->_elements;
    }

    /**
     * {@inheritDoc}
     */
    public function first()
    {
        return reset($this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function last()
    {
        return end($this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function key()
    {
        return key($this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function next()
    {
        return next($this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function current()
    {
        return current($this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function remove($key)
    {
        if (isset($this->_elements[$key]) || array_key_exists($key, $this->_elements)) {
            $removed = $this->_elements[$key];
            unset($this->_elements[$key]);

            return $removed;
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function removeElement($element)
    {
        $key = array_search($element, $this->_elements, true);

        if ($key !== false) {
            unset($this->_elements[$key]);

            return true;
        }

        return false;
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetExists($offset)
    {
        return $this->containsKey($offset);
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value)
    {
        if ( ! isset($offset)) {
            return $this->add($value);
        }
        return $this->set($offset, $value);
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetUnset($offset)
    {
        return $this->remove($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function containsKey($key)
    {
        return isset($this->_elements[$key]) || array_key_exists($key, $this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function contains($element)
    {
        return in_array($element, $this->_elements, true);
    }

    /**
     * {@inheritDoc}
     */
    public function exists(Closure $p)
    {
        foreach ($this->_elements as $key => $element) {
            if ($p($key, $element)) {
                return true;
            }
        }
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function indexOf($element)
    {
        return array_search($element, $this->_elements, true);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        if (isset($this->_elements[$key])) {
            return $this->_elements[$key];
        }
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getKeys()
    {
        return array_keys($this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function getValues()
    {
        return array_values($this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $value)
    {
        $this->_elements[$key] = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        $this->_elements[] = $value;
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function isEmpty()
    {
        return ! $this->_elements;
    }

    /**
     * Required by interface IteratorAggregate.
     *
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_elements);
    }

    /**
     * {@inheritDoc}
     */
    public function map(Closure $func)
    {
        return new static(array_map($func, $this->_elements));
    }

    /**
     * {@inheritDoc}
     */
    public function filter(Closure $p)
    {
        return new static(array_filter($this->_elements, $p));
    }

    /**
     * {@inheritDoc}
     */
    public function forAll(Closure $p)
    {
        foreach ($this->_elements as $key => $element) {
            if ( ! $p($key, $element)) {
                return false;
            }
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function partition(Closure $p)
    {
        $coll1 = $coll2 = array();
        foreach ($this->_elements as $key => $element) {
            if ($p($key, $element)) {
                $coll1[$key] = $element;
            } else {
                $coll2[$key] = $element;
            }
        }
        return array(new static($coll1), new static($coll2));
    }

    /**
     * Returns a string representation of this object.
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . '@' . spl_object_hash($this);
    }

    /**
     * {@inheritDoc}
     */
    public function clear()
    {
        $this->_elements = array();
    }

    /**
     * {@inheritDoc}
     */
    public function slice($offset, $length = null)
    {
        return array_slice($this->_elements, $offset, $length, true);
    }

    /**
     * {@inheritDoc}
     */
    public function matching(Criteria $criteria)
    {
        $expr     = $criteria->getWhereExpression();
        $filtered = $this->_elements;

        if ($expr) {
            $visitor  = new ClosureExpressionVisitor();
            $filter   = $visitor->dispatch($expr);
            $filtered = array_filter($filtered, $filter);
        }

        if ($orderings = $criteria->getOrderings()) {
            $next = null;
            foreach (array_reverse($orderings) as $field => $ordering) {
                $next = ClosureExpressionVisitor::sortByField($field, $ordering == 'DESC' ? -1 : 1, $next);
            }

            usort($filtered, $next);
        }

        $offset = $criteria->getFirstResult();
        $length = $criteria->getMaxResults();

        if ($offset || $length) {
            $filtered = array_slice($filtered, (int)$offset, $length);
        }

        return new static($filtered);
    }
}
