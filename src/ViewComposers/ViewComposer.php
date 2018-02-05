<?php

namespace PodPoint\JsLang\ViewComposers;

use Illuminate\Contracts\View\View;

class ViewComposer
{
    /**
     * Binds the data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $keys = config('javascript.lang');
        $data = [];

        foreach ($keys as $value) {
            $trans = trans($value);

            if (is_array($trans)) {
                $data = array_merge($data, $this->transArray($trans, $value));
            } else {
                $data[$value] = trans($value);
            }
        }

        $view->with([
            'jslang' => json_encode($data)
        ]);
    }

    /**
     * Translates an array of options with a prefix
     *
     * @param  array  $array
     * @param  string $prefix
     * @return array
     */
    private function transArray(array $array, $prefix)
    {
        $data = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $data = array_merge($data, $this->transArray($value, $prefix . '.' . $key));
            } else {
                $data[$prefix . '.' . $key] = trans($value);
            }
        }

        return $data;
    }
}
