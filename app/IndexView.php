<?php

include("View.php");

class IndexView extends View
{
    protected $modelPopCourses;
    protected $modelPopInstructors;
    protected $modelRecCourses;
    protected $modelRecInstructors;
    protected $switch1 = 0;
    protected $switch2 = 0;
    protected $count = 0;
    protected $mostPopCourses = [];
    protected $mostPopInstructors = [];
    protected $mostRecCourses = [];
    protected $mostRecInstructors = [];
    protected $table = [];

    public function updateState(Observable $m)
    {
        echo "made it to view";
        $this->modelPopCourses = $m->getPopCourses();
        $this->modelPopInstructors = $m->getPopInstructors();

        $this->modelRecCourses = $m->getRecCourses();
        $this->modelRecInstructors = $m->getRecInstructors();

            if(!empty($this->modelPopCourses))
            {
                foreach ($this-> modelPopCourses as $key => $val)
                {
                    if(!is_array($val) && !is_object($val))
                    {
                        $this->addVar($key,$val);
                    }
                }
            }

            $this->table[0] = $this->mostPopCourses;
            $this->switch1 = 1;
            $this->count = 0;


        if (!empty($this->modelPopInstructors)) {

            foreach ($this->modelPopInstructors as $key => $val) {
                if (!is_array($val) && !is_object($val)) {
                    //echo $key . "=" . $val;
                    $this->addVar($key, $val);
                }
            }
        }

        $this->table[1] = $this->mostPopInstructors;
        $this->switch2 = 1;
        $this->count = 0;

        if (!empty($this->modelRecCourses)) {
            foreach ($this->modelRecCourses as $key => $val) {
                if (!is_array($val) && !is_object($val)) {
                    //  echo $key . "=" . $val;
                    $this->addVar($key, $val);
                }
            }
        }

        $this->table[2] = $this->mostRecCourses;
        $this->count = 0;

        if (!empty($this->modelRecTeachers)) {

            foreach ($this->modelRecTeachers as $key => $val) {
                if (!is_array($val) && !is_object($val)) {
                    //echo $key . "=" . $val;
                    $this->addVar($key, $val);
                }
            }
        }

        $this->table[3] = $this->mostRecInstructors;
        $this->count = 0;

        return $this->table;
    }

    public function addVar($name, $value)
    {
        switch ($name) {
            case "course_id":
                if ($this->switch1 === 0)
                {
                    $this->mostPopCourses[$this->count][$name] = $value;
                } else {
                    $this->mostRecCourses[$this->count][$name] = $value;
                }
                break;
            case "course_name":
                if ($this->switch1 === 0)
                {

                    $this->mostPopCourses[$this->count][$name] = $value;
                } else {
                    $this->mostRecCourses[$this->count][$name] = $value;
                }
                break;
            case "course_description":
                if ($this->switch1 === 0)
                {
                    $this->mostPopCourses[$this->count][$name] = $value;
                } else {
                    $this->mostRecCourses[$this->count][$name] = $value;
                }
                break;
            case "course_recommendation_count":
                if ($this->switch1 === 0)
                {
                    $this->mostPopCourses[$this->count][$name] = $value;
                } else {
                    $this->mostRecCourses[$this->count][$name] = $value;
                }
                break;
            case "course_access_count":
                if ($this->switch1 === 0)
                {
                    $this->mostPopCourses[$this->count][$name] = $value;
                } else {
                    $this->mostRecCourses[$this->count][$name] = $value;
                }
                break;
            case "course_image":
                if ($this->switch1 === 0)
                {
                    $this->mostPopCourses[$this->count][$name] = $value;
                } else {
                    $this->mostRecCourses[$this->count][$name] = $value;
                }
                $this->count++;
                break;
            case "instructor_id":
                if ($this->switch2 === 0)
                {

                    $this->mostPopInstructors[$this->count][$name] = $value;
                } else {
                    $this->mostRecInstructors[$this->count][$name] = $value;
                }

                break;
            case "instructor_name":
                if ($this->switch2 === 0)
                {
                    $this->mostPopInstructors[$this->count][$name] = $value;
                } else {
                    $this->mostRecInstructors[$this->count][$name] = $value;
                }
                $this->count++;
                break;
            default:
                break;

        }
    }
}