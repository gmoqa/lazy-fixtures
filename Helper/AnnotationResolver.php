<?php

namespace LazyFixturesBundle\Helper;

use Faker\Factory;
use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

class AnnotationResolver
{
    /**
     * @var LazyFixtureAnnotation
     */
    private $annotation;

    /**
     * @var
     */
    private $faker;

    /**
     * Processor constructor.
     * @param LazyFixtureAnnotation $annotation
     */
    public function __construct(LazyFixtureAnnotation $annotation)
    {
        $this->annotation = $annotation;
        $this->faker = Factory::create();
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        $formatter = $this->annotation->getName();

        switch ($this->annotation->getName()) {
            case 'AmPm':
                return $this->faker->$formatter($this->annotation->max);
                break;
            case 'NumberBetween':
                return $this->faker->$formatter($this->annotation->min, $this->annotation->max);
                break;
            case 'Boolean':
                return $this->faker->$formatter($this->annotation->chanceOfGettingTrue);
                break;
            case 'Asciify':
                return $this->faker->$formatter($this->annotation->string);
                break;
            case 'BiasedNumberBetween':
                return $this->faker->$formatter(
                    $this->annotation->min,
                    $this->annotation->max,
                    $this->annotation->function
                );
                break;
            case 'Bothify':
                return $this->faker->$formatter($this->annotation->string);
                break;
            case 'Date':
                return $this->faker->$formatter($this->annotation->format, $this->annotation->max);
                break;
            case 'Datetime':
                return $this->faker->$formatter($this->annotation->max, $this->annotation->timezone);
                break;
            case 'DatetimeAd':
                return $this->faker->$formatter($this->annotation->max, $this->annotation->timezone);
                break;
            case 'DateTimeBetween':
                return $this->faker->$formatter(
                    $this->annotation->startDate,
                    $this->annotation->endDate,
                    $this->annotation->timezone
                );
                break;
            case 'DateTimeInInterval':
                return $this->faker->$formatter(
                    $this->annotation->startDate,
                    $this->annotation->interval,
                    $this->annotation->timezone
                );
                break;
            case 'DateTimeThisDecade':
                return $this->faker->$formatter(
                    $this->annotation->max,
                    $this->annotation->timezone
                );
                break;
            case 'DateTimeThisMonth':
                return $this->faker->$formatter(
                    $this->annotation->max,
                    $this->annotation->timezone
                );
                break;
            case 'DateTimeThisYear':
                return $this->faker->$formatter(
                    $this->annotation->max,
                    $this->annotation->timezone
                );
                break;
            case 'DayOfMonth':
                return $this->faker->$formatter($this->annotation->max);
                break;
            case 'DayOfWeek':
                return $this->faker->$formatter($this->annotation->max);
                break;
            case 'FirstName':
                return $this->faker->$formatter($this->annotation->gender);
                break;
            case 'Iban':
                return $this->faker->$formatter($this->annotation->countryCode);
                break;
            case 'Image':
                return $this->faker->$formatter(
                    $this->annotation->dir,
                    $this->annotation->width,
                    $this->annotation->height
                );
                break;
            case 'ImageUrl':
                return $this->faker->$formatter(
                    $this->annotation->width,
                    $this->annotation->height
                );
                break;
            case 'Iso8601':
                return $this->faker->$formatter($this->annotation->max);
                break;
            case 'Latitude':
                return $this->faker->$formatter(
                    $this->annotation->min,
                    $this->annotation->max
                );
                break;
            case 'Longitude':
                return $this->faker->$formatter(
                    $this->annotation->min,
                    $this->annotation->max
                );
                break;
            case 'Month':
                return $this->faker->$formatter($this->annotation->max);
                break;
            case 'MonthName':
                return $this->faker->$formatter($this->annotation->max);
                break;
            case 'Name':
                return $this->faker->$formatter($this->annotation->gender);
                break;
            case 'Numerify':
                return $this->faker->$formatter($this->annotation->string);
                break;
            case 'Paragraph':
                return $this->faker->$formatter(
                    $this->annotation->nbSentences,
                    $this->annotation->variableNbSentences
                );
                break;
            case 'Paragraphs':
                return $this->faker->$formatter(
                    $this->annotation->nb,
                    $this->annotation->asText
                );
                break;
            case 'RandomElement':
                return $this->faker->$formatter($this->annotation->array);
                break;
            case 'RandomElements':
                return $this->faker->$formatter(
                    $this->annotation->array,
                    $this->annotation->count
                );
                break;
            case 'RandomFloat':
                return $this->faker->$formatter(
                    $this->annotation->nbMaxDecimals,
                    $this->annotation->min,
                    $this->annotation->max
                );
                break;
            case 'RandomHtml':
                return $this->faker->$formatter(
                    $this->annotation->a,
                    $this->annotation->b
                );
                break;
            case 'RandomNumber':
                return $this->faker->$formatter(
                    $this->annotation->nbDigits,
                    $this->annotation->strict
                );
                break;
            case 'RealText':
                return $this->faker->$formatter(
                    $this->annotation->maxNbChars,
                    $this->annotation->indexSize
                );
                break;
            case 'Regexify':
                return $this->faker->$formatter($this->annotation->string);
                break;
            case 'Sentence':
                return $this->faker->$formatter(
                    $this->annotation->nbWords,
                    $this->annotation->variableNbWords
                );
                break;
            case 'Sentences':
                return $this->faker->$formatter(
                    $this->annotation->nb,
                    $this->annotation->asText
                );
                break;
            case 'Shuffle':
                return $this->faker->$formatter($this->annotation->string);
                break;
            case 'Text':
                return $this->faker->$formatter($this->annotation->maxNbChars);
                break;
            case 'Time':
                return $this->faker->$formatter(
                    $this->annotation->format,
                    $this->annotation->max
                );
                break;
            case 'Title':
                return $this->faker->$formatter($this->annotation->gender);
                break;
            case 'UnixTime':
                return $this->faker->$formatter($this->annotation->max);
                break;
            case 'Words':
                return $this->faker->$formatter(
                    $this->annotation->nb,
                    $this->annotation->asText
                );
                break;
            case 'Year':
                return $this->faker->$formatter($this->annotation->max);
                break;
            default:
                return $this->faker->$formatter;
        }
    }
}