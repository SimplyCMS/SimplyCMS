<?php


namespace System\Classes;

use Hamcrest\Core\Set;
use Illuminate\Support\Arr;
use SimplyCMS\Support\Contracts\Repository;
use System\Database\Models\Setting;

class SettingsRepository implements Repository
{
    /**
     * @var array
     */
    protected array $items;

    /**
     * SettingsRepository constructor.
     */
    public function __construct()
    {

    }

    /**
     * Detect if the system is in flat-file mode
     */
    private function isFlatFileSystem()
    {
        // TODO:
    }

    /**
     * Load the setting items
     *
     * @return void
     */
    public function loadItems()
    {
        $settings = Setting::all(['item', 'value']);
        foreach ($settings as $key => $valueArr) {
            $this->items[$valueArr['item']] = $valueArr['value'];
        }
        return Arr::dot(collect($this->items));
    }

    /**
     * @inheritDoc
     */
    public function has($key)
    {
        // TODO: Implement has() method.
    }

    /**
     * @inheritDoc
     */
    public function get($key, $default = null)
    {
        // TODO: Implement get() method.
    }

    /**
     * Get all of the setting items for the application.
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * @inheritDoc
     */
    public function set($key, $value = null)
    {
        // TODO: Implement set() method.
    }

    /**
     * @inheritDoc
     */
    public function prepend($key, $value)
    {
        // TODO: Implement prepend() method.
    }

    /**
     * @inheritDoc
     */
    public function push($key, $value)
    {
        // TODO: Implement push() method.
    }
}
