<?php

namespace NorseBlue\Xmlify\Parser;

use SimpleXMLElement;

class XmlElement extends SimpleXMLElement
{
    public function toArray(bool $omit_prefix = false): array
    {
        $data = $this->childrenArray($omit_prefix);

        $attributes = $this->attributesArray($omit_prefix);
        if (!empty($attributes)) {
            $data['@attributes'] = $attributes;
        }

        return $data;
    }

    public function childrenArray(bool $omit_prefix = false)
    {
        $result = collect([''])
            ->merge($this->getNamespaces())
            ->flatMap(function ($namespace, $prefix) use ($omit_prefix) {
                $children = collect($this->children($namespace))
                    ->map(function($child) use ($omit_prefix) {
                        if ($child instanceof XmlElement) {
                            return $child->toArray(($omit_prefix));
                        }

                        // TODO: cast?
                        return (string)$child;
                    });

                if (empty($children) || $omit_prefix || is_numeric($prefix)) {
                    return $children;
                }

                return collect($children)
                    ->mapWithKeys(function ($value, $key) use ($prefix) {
                        return ["$prefix:$key" => $value];
                    })
                    ->all();
            });

        return $result->all();
    }

    public function attributesArray(bool $omit_prefix = false): array
    {
        $result = collect([''])
            ->merge($this->getNamespaces())
            ->flatMap(function ($namespace, $prefix) use ($omit_prefix) {
                $attributes = collect($this->attributes($namespace))
                    ->map(function($attribute) {
                        return (string)$attribute;
                    });

                if (empty($attributes) || $omit_prefix || is_numeric($prefix)) {
                    return $attributes;
                }

                return collect($attributes)
                    ->mapWithKeys(function ($value, $key) use ($prefix) {
                        return ["$prefix:$key" => $value];
                    })
                    ->all();
            })->filter(function($value, $key) {
                return !preg_match('/^xsi:|^xmlns:/', $key);
            });

        return $result->all();
    }

    public function get(string $xpath, $default = null)
    {
        $element = $this->xpath($xpath);


    }

    private function convertToArray(SimpleXMLElement $elements): array
    {
        $data = [];
        foreach ($elements as $element) {
            $key = $element->getName();
            $data[$key] = $this->{$key};
        }

        return $data;
    }
}
