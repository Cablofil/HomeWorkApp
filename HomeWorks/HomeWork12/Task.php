<?php

class Task
{
    private string $taskId;
    protected string $taskName;

    protected Priority $priority;

    protected Status $status;

    public function __construct(string $taskName, Priority $priority, Status $status)
    {
        $this->setTaskId();
        $this->setTaskName($taskName);
        $this->setStatus($status);
        $this->setPriority($priority);
    }

    /**
     * @param Status $status
     * @return void
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    /**
     * @param Priority $priority
     * @return void
     */
    public function setPriority(Priority $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return void
     */
    public function setTaskId(): void
    {
        $taskId = uniqid();
        $this->taskId = $taskId;
    }

    /**
     * @param string $taskName
     * @return void
     */
    public function setTaskName(string $taskName): void
    {
        $this->taskName = $taskName;
    }

    /**
     * @return string
     */
    public function getTaskId(): string
    {
        return $this->taskId;
    }

    /**
     * @return string
     */
    public function getTaskName(): string
    {
        return $this->taskName;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @return Priority
     */
    public function getPriority(): Priority
    {
        return $this->priority;
    }

}